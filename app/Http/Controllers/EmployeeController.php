<?php

namespace App\Http\Controllers;

use App\Event;
use App\Person;
use App\Employe;
use App\Contract;
use Illuminate\Http\Request;
use App\PersonnelFileRow;
use App\Exceptions\PersonInputException;
use App\etablissements;

class EmployeeController extends Controller
{
    public static function saveEmployees($people)
    {
        $employees = Employe::all();
        foreach ($employees as $key => $employee) {
            $found = false;
            foreach ($people as $key => $person) {
                if ($employee->ref == $person->matricule) {
                    $found = true;
                    break;
                }
            }
            if ($found == false) { // Employee isn't in person list, therefore delete employee
                Event::create([
                    'transaction_id' => $people->first()->transaction_id,
                    'year' => $people->first()->year,
                    'month' => $people->first()->month,
                    'action' => 'EMPLOYEE_DELETE',
                    'ref' => $employee->ref,
                    'data' => json_encode([]),
                ]);
                $employee->delete();
            }
        }
        foreach ($people as $key => $person) {
            EmployeeController::saveEmployee($person);
        }
    }

    public static function saveEmployee($person)
    {
        // Person from Database and passed directly aren't exactly the same (in the format of dates for example)
        $person->refresh();

        $employee = Employe::findByRef($person->matricule);
        $new_employee = false;
        if (is_null($employee)) {
            $employee = new Employe();
            $new_employee = true;
            $employee->ref = $person->matricule;
        }

        EmployeeController::fillEmployeeLastName($employee, $person);
        EmployeeController::fillEmployeeFirstName($employee, $person);
        EmployeeController::fillEmployeeDateNaissance($employee, $person);
        EmployeeController::fillEmployeeGender($employee, $person);
        EmployeeController::fillEmployeeDateAnciennete($employee, $person);

        $employee->save();
        if ($new_employee) {
            Event::create([
                'transaction_id' => $person->transaction_id,
                'year' => $person->year,
                'month' => $person->month,
                'action' => 'EMPLOYEE_CREATE',
                'ref' => $employee->ref,
                'data' => json_encode([]),
            ]);
        }

        $contract = $employee->contract();
        $new_contract = false;
        if (is_null($contract)) {
            $contract = new Contract();
            $new_contract = true;
            $contract->employee_ref = $employee->ref;
        }

        EmployeeController::fillContractType($contract, $person);
        EmployeeController::fillContractCSP($contract, $person);
        EmployeeController::fillContractCoef($contract, $person);
        EmployeeController::fillContractCoefHoraire($contract, $person);
        EmployeeController::fillContractNbrMoisSalaireDeBase($contract, $person);
        // EmployeeController::fillContractSalaireAnnuelDeBase($contract, $person);
        EmployeeController::fillContractSalaireContractuelProrate($contract, $person);

        $etab = etablissements::where("code", $person->c_etab)->first();
        if (is_null($etab)) {
            $etab = etablissements::create([
                "code" => $person->c_etab,
                "libelle" => $person->l_etab,
            ]);
            Event::create([
                'transaction_id' => $person->transaction_id,
                'year' => $person->year,
                'month' => $person->month,
                'action' => 'ETABLISSEMENT_CREATE',
                'data' => json_encode([
                    "code" => $person->c_etab,
                    "libelle" => $person->l_etab,
                ]),
            ]);
        }
        $contract->etab = $etab->code;
        $contract->save();
        if ($new_contract) {
            Event::create([
                'transaction_id' => $person->transaction_id,
                'year' => $person->year,
                'month' => $person->month,
                'action' => 'EMPLOYEE_CONTRACT_CREATE',
                'ref' => $employee->ref,
                'data' => json_encode([]),
            ]);
        }
    }

    public static function fillEmployeeLastName(Employe $employee, PersonnelFileRow $person) {
        if (isset($person->nom)) {
            if ($employee->last_name != $person->nom) {
                if ($employee->last_name != null) {
                    Event::create([
                        'transaction_id' => $person->transaction_id,
                        'year' => $person->year,
                        'month' => $person->month,
                        'action' => 'EMPLOYEE_LAST_NAME_CHANGE',
                        'ref' => $employee->ref,
                        'old' => $employee->last_name,
                        'new' => $person->nom,
                        'data' => json_encode([]),
                    ]);
                }
                $employee->last_name = $person->nom;
            }
        } else {
            throw new PersonInputException("Nom non défini");
        }
    }

    public static function fillEmployeeFirstName(Employe $employee, PersonnelFileRow $person) {
        if ($employee->first_name != $person->prenom) {
            if ($employee->first_name != null) {
                Event::create([
                    'transaction_id' => $person->transaction_id,
                    'year' => $person->year,
                    'month' => $person->month,
                    'action' => 'EMPLOYEE_FIRST_NAME_CHANGE',
                    'ref' => $employee->ref,
                    'old' => $employee->first_name,
                    'new' => $person->prenom,
                    'data' => json_encode([]),
                ]);
            }
            $employee->first_name = $person->prenom;
        }
    }

    public static function fillEmployeeDateNaissance(Employe $employee, PersonnelFileRow $person) {
        if (isset($person->date_de_naissance)) {
            if ($employee->date_naissance != $person->date_de_naissance) {
                if ($employee->date_naissance != null) {
                    Event::create([
                        'transaction_id' => $person->transaction_id,
                        'year' => $person->year,
                        'month' => $person->month,
                        'action' => 'EMPLOYEE_BIRTHDAY_CHANGE',
                        'ref' => $employee->ref,
                        'old' => $employee->date_naissance,
                        'new' => $person->date_de_naissance,
                        'data' => json_encode([]),
                    ]);
                }
                $employee->date_naissance = $person->date_de_naissance;
            }
        } else {
            throw new PersonInputException("Date de naissance non défini");
        }
    }

    public static function fillEmployeeDateAnciennete(Employe $employee, PersonnelFileRow $person) {
        if (isset($person->date_anciennete)) {
            if ($employee->date_anciennete != $person->date_anciennete) {
                if ($employee->date_anciennete != null) {
                    Event::create([
                        'transaction_id' => $person->transaction_id,
                        'year' => $person->year,
                        'month' => $person->month,
                        'action' => 'EMPLOYEE_ANCIENNETE_CHANGE',
                        'ref' => $employee->ref,
                        'old' => $employee->date_anciennete,
                        'new' => $person->date_anciennete,
                        'data' => json_encode([]),
                    ]);
                }
                $employee->date_anciennete = $person->date_anciennete;
            }
        } else {
            throw new PersonInputException("Date d'ancienneté non défini");
        }
    }

    public static function fillEmployeeGender(Employe $employee, PersonnelFileRow $person) {
        if (isset($person->sexe)) {
            switch ($person->sexe) {
                case 1:
                    $gender = 'M';
                    break;
                case 2:
                    $gender = 'F';
                    break;
                default:
                    $gender = 'U';
                    break;
            }
            if ($employee->gender != $gender) {
                if ($employee->gender != null) {
                    Event::create([
                        'transaction_id' => $person->transaction_id,
                        'year' => $person->year,
                        'month' => $person->month,
                        'action' => 'EMPLOYEE_GENDER_CHANGE',
                        'ref' => $employee->ref,
                        'old' => $employee->gender,
                        'new' => $gender,
                        'data' => json_encode([]),
                    ]);
                }
                $employee->gender = $gender;
            }
        }
    }

    public static function fillContractType(Contract $contract, PersonnelFileRow $person) {
        if (isset($person->type_contrat)) {
            if ($contract->type != $person->type_contrat) {
                if ($contract->type != null) {
                    Event::create([
                        'transaction_id' => $person->transaction_id,
                        'year' => $person->year,
                        'month' => $person->month,
                        'action' => 'CONTRACT_TYPE_CHANGE',
                        'ref' => $contract->employee_ref,
                        'old' => $contract->type,
                        'new' => $person->type_contrat,
                        'data' => json_encode([]),
                    ]);
                }
                $contract->type = $person->type_contrat;
            }
        } else {
            throw new PersonInputException("Type de contrat non défini");
        }
    }

    public static function fillContractCSP(Contract $contract, PersonnelFileRow $person) {
        if (isset($person->c_categorie_prof_resolue)) {
            if ($contract->csp != $person->c_categorie_prof_resolue) {
                if ($contract->csp != null) {
                    Event::create([
                        'transaction_id' => $person->transaction_id,
                        'year' => $person->year,
                        'month' => $person->month,
                        'action' => 'CONTRACT_CSP_CHANGE',
                        'ref' => $contract->employee_ref,
                        'old' => $contract->csp,
                        'new' => $person->c_categorie_prof_resolue,
                        'data' => json_encode([]),
                    ]);
                }
                $contract->csp = $person->c_categorie_prof_resolue;
            }
        } else {
            throw new PersonInputException("CSP non défini");
        }
    }

    public static function fillContractCoef(Contract $contract, PersonnelFileRow $person) {
        if (isset($person->coef)) {
            if ($contract->coef != $person->coef) {
                if ($contract->coef != null) {
                    Event::create([
                        'transaction_id' => $person->transaction_id,
                        'year' => $person->year,
                        'month' => $person->month,
                        'action' => 'CONTRACT_COEF_CHANGE',
                        'ref' => $contract->employee_ref,
                        'old' => $contract->coef,
                        'new' => $person->coef,
                        'data' => json_encode([]),
                    ]);
                }
                $contract->coef = $person->coef;
            }
        } else {
            throw new PersonInputException("Coefficient non défini");
        }
    }

    public static function fillContractCoefHoraire(Contract $contract, PersonnelFileRow $person) {
        if (isset($person->coef_horaire)) {
            if ($contract->coef_horaire != $person->coef_horaire) {
                if ($contract->coef_horaire != null) {
                    Event::create([
                        'transaction_id' => $person->transaction_id,
                        'year' => $person->year,
                        'month' => $person->month,
                        'action' => 'CONTRACT_COEF_HORAIRE_CHANGE',
                        'ref' => $contract->employee_ref,
                        'old' => $contract->coef_horaire,
                        'new' => $person->coef_horaire,
                        'data' => json_encode([]),
                    ]);
                }
                $contract->coef_horaire = $person->coef_horaire;
            }
        } else {
            throw new PersonInputException("Coefficient horaire non défini");
        }
    }

    public static function fillContractNbrMoisSalaireDeBase(Contract $contract, PersonnelFileRow $person) {
        if (isset($person->nbr_mois_salaire_de_base)) {
            if ($contract->nbr_mois_salaire_de_base != $person->nbr_mois_salaire_de_base) {
                if ($contract->nbr_mois_salaire_de_base != null) {
                    Event::create([
                        'transaction_id' => $person->transaction_id,
                        'year' => $person->year,
                        'month' => $person->month,
                        'action' => 'CONTRACT_NBR_MOIS_SALAIRE_DE_BASE_CHANGE',
                        'ref' => $contract->employee_ref,
                        'old' => $contract->nbr_mois_salaire_de_base,
                        'new' => $person->nbr_mois_salaire_de_base,
                        'data' => json_encode([]),
                    ]);
                }
                $contract->nbr_mois_salaire_de_base = $person->nbr_mois_salaire_de_base;
            }
        } else {
            throw new PersonInputException("Nombre de mois pour le salaire de base non défini");
        }
    }

    public static function fillContractSalaireAnnuelDeBase(Contract $contract, PersonnelFileRow $person) {
        if (isset($person->salaire_annuel_de_base)) {
            if ($contract->salaire_annuel_de_base != $person->salaire_annuel_de_base) {
                if ($contract->salaire_annuel_de_base != null) {
                    Event::create([
                        'transaction_id' => $person->transaction_id,
                        'year' => $person->year,
                        'month' => $person->month,
                        'action' => 'CONTRACT_SALAIRE_ANNUEL_DE_BASE_CHANGE',
                        'ref' => $contract->employee_ref,
                        'old' => $contract->salaire_annuel_de_base,
                        'new' => $person->salaire_annuel_de_base,
                        'data' => json_encode([]),
                    ]);
                }
                $contract->salaire_annuel_de_base = $person->salaire_annuel_de_base;
            }
        } else {
            throw new PersonInputException("Salaire annuel de base non défini");
        }
    }

    public static function fillContractSalaireContractuelProrate(Contract $contract, PersonnelFileRow $person) {
        if (isset($person->salaire_contractuel_prorate)) {
            if ($contract->salaire_contractuel_prorate != $person->salaire_contractuel_prorate) {
                if ($contract->salaire_contractuel_prorate != null) {
                    Event::create([
                        'transaction_id' => $person->transaction_id,
                        'year' => $person->year,
                        'month' => $person->month,
                        'action' => 'CONTRACT_SALAIRE_CONTRACTUEL_PRORATE_CHANGE',
                        'ref' => $contract->employee_ref,
                        'old' => $contract->salaire_contractuel_prorate,
                        'new' => $person->salaire_contractuel_prorate,
                        'data' => json_encode([]),
                    ]);
                }
                $contract->salaire_contractuel_prorate = $person->salaire_contractuel_prorate;
            }
        } else {
            throw new PersonInputException("Salaire contractuel proraté non défini");
        }
    }
}
