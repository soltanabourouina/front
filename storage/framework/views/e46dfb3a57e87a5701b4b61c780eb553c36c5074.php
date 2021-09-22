<?php $__env->startSection('title', "Ajouter un évenement a $simulation->code"); ?>

<?php $__env->startSection('content'); ?>
    <div class="w-25 m-auto">
        <?php echo $__env->make('alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form action="<?php echo e(route('createSimulationEventPOST', $simulation->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="Description">
            </div>
            <div class="form-group mb-3">
                <label for="year">Année</label>
                <input type="number" class="form-control" name="year" id="year" placeholder="Year" required>
            </div>
            <div class="form-group mb-3">
                <label for="month">Mois</label>
                <input type="number" class="form-control" name="month" id="month" placeholder="Month">
            </div>
            <div class="form-group mb-3">
                <label for="action">Action</label>
                <select class="form-control action" name="action" id="action">
                    <option value="UNSELECTED" selected>Selectionner une action</option>
                    <option id="GENERAL_RAISE" value="GENERAL_RAISE">Augmentation générale</option>
                </select>
            </div>
            <div id="group-GENERAL_RAISE" class="d-none selector-group">
                <div class="form-group mb-3">
                    <label for="GENERAL_RAISE_PERCENTAGE">Pourcentage</label>
                    <input type="number" class="form-control" name="GENERAL_RAISE_PERCENTAGE" id="GENERAL_RAISE_PERCENTAGE" placeholder="Pourcentage">
                </div>
                <div class="form-group mb-3">
                    <label for="GENERAL_RAISE_MINIMUM">Min</label>
                    <input type="number" class="form-control" name="GENERAL_RAISE_MINIMUM" id="GENERAL_RAISE_MINIMUM" placeholder="Min">
                </div>
                <div class="form-group mb-3">
                    <label for="GENERAL_RAISE_MAXIMUM">Max</label>
                    <input type="number" class="form-control" name="GENERAL_RAISE_MAXIMUM" id="GENERAL_RAISE_MAXIMUM" placeholder="Max">
                </div>
                <div class="form-group mb-3">
                    <label class="mb-2">Selection</label>
                    <div class="row">
                        <div class="col-6 pb-3">
                            <label>Catégories socioprofessionels</label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="GENERAL_RAISE_POPULATION_CSP_A" id="GENERAL_RAISE_POPULATION_CSP_A" value="true" checked>
                            
                                <label class="form-check-label" for="GENERAL_RAISE_POPULATION_CSP_A">Agent de Maitrise</label>
                               </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="GENERAL_RAISE_POPULATION_CSP_B" id="GENERAL_RAISE_POPULATION_CSP_B" value="true" checked>
                            
                                <label class="form-check-label" for="GENERAL_RAISE_POPULATION_CSP_B">Agent de Maitrise Atelier</label>
                             </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="GENERAL_RAISE_POPULATION_CSP_C" id="GENERAL_RAISE_POPULATION_CSP_C" value="true" checked>
                           
                                <label class="form-check-label" for="GENERAL_RAISE_POPULATION_CSP_C">Cadre</label>
                                 </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="GENERAL_RAISE_POPULATION_CSP_D" id="GENERAL_RAISE_POPULATION_CSP_D" value="true" checked>
                           
                                <label class="form-check-label" for="GENERAL_RAISE_POPULATION_CSP_D">Cadre Dirigeant</label>
                              </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="GENERAL_RAISE_POPULATION_CSP_E" id="GENERAL_RAISE_POPULATION_CSP_E" value="true" checked>
                  
                                <label class="form-check-label" for="GENERAL_RAISE_POPULATION_CSP_E">Employé</label>
                                         </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="GENERAL_RAISE_POPULATION_CSP_N" id="GENERAL_RAISE_POPULATION_CSP_N" value="true" checked>
                           
                                <label class="form-check-label" for="GENERAL_RAISE_POPULATION_CSP_N">Ouvrier false qualifié</label>
                                </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="GENERAL_RAISE_POPULATION_CSP_O" id="GENERAL_RAISE_POPULATION_CSP_O" value="true" checked>
                           
                                <label class="form-check-label" for="GENERAL_RAISE_POPULATION_CSP_O">Ouvrier</label>
                               </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="GENERAL_RAISE_POPULATION_CSP_P" id="GENERAL_RAISE_POPULATION_CSP_P" value="true" checked>
                            
                                <label class="form-check-label" for="GENERAL_RAISE_POPULATION_CSP_P">Ouvrier Qualifié</label>
                               </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="GENERAL_RAISE_POPULATION_CSP_S" id="GENERAL_RAISE_POPULATION_CSP_S" value="true" checked>
                          
                                <label class="form-check-label" for="GENERAL_RAISE_POPULATION_CSP_S">Technicien Supérieur</label>
                              </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="GENERAL_RAISE_POPULATION_CSP_T" id="GENERAL_RAISE_POPULATION_CSP_T" value="true" checked>
                           
                                <label class="form-check-label" for="GENERAL_RAISE_POPULATION_CSP_T">Technicien</label>
                              </div>
                        </div>
                        <div class="col-6 pb-3">
                            <label for="GENERAL_RAISE_COEF">Coefficient</label>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="GENERAL_RAISE_POPULATION_COEF_OPERATOR" id="GENERAL_RAISE_POPULATION_COEF_OPERATOR_HT" value="GENERAL_RAISE_POPULATION_COEF_OPERATOR_HT" checked>
                            
                                <label class="form-check-label" for="GENERAL_RAISE_POPULATION_COEF_OPERATOR_HT">Supérieur à</label>
                                </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="GENERAL_RAISE_POPULATION_COEF_OPERATOR" id="GENERAL_RAISE_POPULATION_COEF_OPERATOR_LT" value="GENERAL_RAISE_POPULATION_COEF_OPERATOR_LT">
                            
                                <label class="form-check-label" for="GENERAL_RAISE_POPULATION_COEF_OPERATOR_LT">Inférieur à</label>
                               </div>
                            <input type="number" class="form-control" name="GENERAL_RAISE_COEF" id="GENERAL_RAISE_COEF" placeholder="Coefficient">
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="mb-3 text-end">
                <a href="<?php echo e(route('readSimulationGET', $simulation->id)); ?>" class="btn btn-danger">Annuler</a>
                <button type="submit" class="btn btn-primary">Ajouter un évenement</button>
            </div>
        </form>
    </div>

    <script>
        $('#action').on('change', function(e) {
            let selector = $(this).val();
            // alert(selector)
            $(".selector-group").addClass("d-none");
            $(".selector-group").removeClass("d-block");
            switch (selector) {
                case "GENERAL_RAISE":
                    $("#group-"+selector).removeClass("d-none");
                    break;
                default:
                    break;
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/soltana/Bureau/off/Bookone/resources/views/Simulation/Event/create.blade.php ENDPATH**/ ?>