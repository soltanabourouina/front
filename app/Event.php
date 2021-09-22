<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

    public function delete()
    {
        $this->cancel();
        parent::delete();
    }

    public function cancel()
        {
        $data = json_decode($this->data);
        switch ($this->action) {
            case 'EMPLOYEE_LAST_NAME_CHANGE':
                $employee = Employe::findByRef($this->ref);
                $employee->last_name = $this->old;
                $employee->save();
                break;
            case 'EMPLOYEE_FIRST_NAME_CHANGE':
                $employee = Employe::findByRef($this->ref);
                $employee->first_name = $this->old;
                $employee->save();
                break;
            case 'EMPLOYEE_BIRTHDAY_CHANGE':
                $employee = Employe::findByRef($this->ref);
                $employee->date_naissance = $this->old;
                $employee->save();
                break;
            case 'EMPLOYEE_ANCIENNETE_CHANGE':
                $employee = Employe::findByRef($this->ref);
                $employee->date_anciennete = $this->old;
                $employee->save();
                break;
            case 'EMPLOYEE_GENDER_CHANGE':
                $employee = Employe::findByRef($this->ref);
                $employee->gender = $this->old;
                $employee->save();
                break;
            case 'CONTRACT_TYPE_CHANGE':
                $employee = Employe::findByRef($this->ref);
                $contract = $employee->contract();
                $contract->type = $this->old;
                $contract->save();
                break;
            case 'CONTRACT_COEF_CHANGE':
                $employee = Employe::findByRef($this->ref);
                $contract = $employee->contract();
                $contract->coef = $this->old;
                $contract->save();
                break;
            case 'CONTRACT_COEF_HORAIRE_CHANGE':
                $employee = Employe::findByRef($this->ref);
                $contract = $employee->contract();
                $contract->coef_horaire = $this->old;
                $contract->save();
                break;
            case 'CONTRACT_NBR_MOIS_SALAIRE_DE_BASE_CHANGE':
                $employee = Employe::findByRef($this->ref);
                $contract = $employee->contract();
                $contract->nbr_mois_salaire_de_base = $this->old;
                $contract->save();
                break;
            case 'CONTRACT_SALAIRE_ANNUEL_DE_BASE_CHANGE':
                $employee = Employe::findByRef($this->ref);
                $contract = $employee->contract();
                $contract->salaire_annuel_de_base = $this->old;
                $contract->save();
                break;
            case 'EMPLOYEE_CREATE':
                $employee = Employe::findByRef($this->ref);
                $employee->forceDelete();
                break;
            case 'EMPLOYEE_DELETE':
                $employee = Employe::withTrashed()->where('ref', $this->ref)->first();
                $employee->restore();
                break;
            case 'EMPLOYEE_CONTRACT_CREATE':
                $employee = Employe::findByRef($this->ref);
                $employee->contract()->delete();
                break;
            case 'ETABLISSEMENT_CREATE':
                $etab = etablissements::findByCode($data->code);
                $etab->delete();
                break;
            case 'PAYROLL_ROW_CREATE':
                $payroll = PayrollRow::find($data->payroll_row_id);
                $payroll->delete();
                break;
            default:
                throw new UnknownEventTypeException();                
                break;
        }
    }

    public function employee()
    {
        return Employe::withTrashed()->where('ref',$this->ref)->first();
    }

    public function contract()
    {
        return Employe::findByRef($this->ref)->contract();
    }

    public function verbose_action()
    {
        $verbose_action = '';
        switch ($this->action) {
            case 'EMPLOYEE_LAST_NAME_CHANGE':
                $verbose_action = "Nom d'employé modifié";
                break;
            case 'EMPLOYEE_FIRST_NAME_CHANGE':
                $verbose_action = "Prénom d'employé modifié";
                break;
            case 'EMPLOYEE_BIRTHDAY_CHANGE':
                $verbose_action = "Date de naissance d'employé modifié";
                break;
            case 'EMPLOYEE_ANCIENNETE_CHANGE':
                $verbose_action = "Date d'ancienneté d'employé modifié";
                break;
            case 'EMPLOYEE_GENDER_CHANGE':
                $verbose_action = "Sexe d'employé modifié";
                break;
            case 'CONTRACT_TYPE_CHANGE':
                $verbose_action = "Type de contrat modifié";
                break;
            case 'CONTRACT_COEF_CHANGE':
                $verbose_action = "Coefficient de contrat modifié";
                break;
            case 'CONTRACT_COEF_HORAIRE_CHANGE':
                $verbose_action = "Coefficient horaire de contrat modifié";
                break;
            case 'CONTRACT_NBR_MOIS_SALAIRE_DE_BASE_CHANGE':
                $verbose_action = "Nombre de mois salaire de base de contrat modifié";
                break;
            case 'CONTRACT_SALAIRE_ANNUEL_DE_BASE_CHANGE':
                $verbose_action = "Salaire annuel de base de contrat modifié";
                break;
            case 'EMPLOYEE_CREATE':
                $verbose_action = "Employé créé";
                break;
            case 'EMPLOYEE_DELETE':
                $verbose_action = "Employé supprimé";
                break;
            default:
                $verbose_action = $this->action;                
                break;
        }
        return $verbose_action;
    }
}
