<?php $__env->startSection('title'); ?>
Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
Home
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')); ?>" rel="stylesheet">
<!--Internal   Notify -->
<link href="<?php echo e(URL::asset('assets/plugins/notify/css/notifIt.css')); ?>" rel="stylesheet" />

<style>
    h3 {
  color: rgb(29, 77, 141);
}
</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-header'); ?>
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Définition des Structures et Integration des Données</h2>
                <p class="mg-b-0">Processus D'integration</p>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row row-md">
    <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
<div class="step">
    <div>
    <div class="title" ><h3>Premiere Etape</h3></div>
    </div>
    <div>

        
      

       <div class="row"> 
        <div class="col-md-6"> 
        <button class="btn btn-primary"
         data-toggle="collapse" href="#multiCollapseExample1" 
         role="button" aria-expanded="false" 
         aria-controls="multiCollapseExample1" onclick="myFunction1()">
         1-Interfaces de correspondances des fichiers</button>
        </div> <br>
        <div class="collapse" id="multiCollapseExample1">
            <div class="col-md-6">  
               <div class="card card-body">
               Correspondances possibles: <br>
               Fichier du personnel<br>
               Fichier de plan de paie <br>
               Fichier de paie <br>
               <div class="col-md-6 align-self-end">  
                <a class="slide-item"  href="<?php echo e(url('/' . ($page = 'file-variants'))); ?>">Créer les variantes de fichiers</a>
               </div>
               </div>
           </div>
         </div>
        </div>


        <br>
         <div class="row">  
            <div class="col-md-6"> 
        <button class="btn btn-primary" 
        type="button" data-toggle="collapse"
         data-target="#multiCollapseExample2"
          aria-expanded="false" 
          aria-controls="multiCollapseExample2" onclick="myFunction2()">
          2-Définir la structure d'un fichier</button>
        </div> <br>
        <div class="collapse" id="multiCollapseExample2">
          
            <div class="col-md-6">  
                <div class="card card-body">
                Structures des fichiers à définir: <br>
                Fichier du personnel<br>
                Fichier de plan de paie <br>
                Fichier de paie <br>
                <div class="col-md-6 align-self-end">  
                    <a class="slide-item" href="<?php echo e(route('spreadsheetColumnStructureReviewGET')); ?>" >Définir la structure d'un fichier</a>
                </div>
                </div>
            </div>
        </div>
        </div>


        <br>
        <div class="row">
        <div class="col-md-6"> 
        <button class="btn btn-primary" 
        type="button" data-toggle="collapse" 
        data-target="#multiCollapseExample3" 
        aria-expanded="false" 
        aria-controls="multiCollapseExample3" onclick="myFunction3()">
        3-Codes budgétaires</button>
        </div>
        <br>
            <div class="collapse multi-collapse" id="multiCollapseExample3">
                <div class="col-md-6">  
                    <div class="card card-body">
                    Définir les codes budgétaires: <br>
                    <div class="col-md-6 align-self-end">  
                        <a class="slide-item" href="<?php echo e(route('budgetCodesGET')); ?>">Codes budgétaires</a>
                        </div>
                    </div>    
                </div>
            </div>
        </div>


    </div>
 </div>
 <div class="step">
     
    <div>
       <div class="title"><h3>Deuxieme Etape</h3></div>
    </div>
    <div>
     

       <button class="btn btn-primary" 
        type="button" data-toggle="collapse" 
        data-target="#multiCollapseExample4" 
        aria-expanded="false" 
        aria-controls="multiCollapseExample4" onclick="myFunction4()">
        Téléchargement des fichiers</button>

       <div class="caption"><br>
           <div class="collapse" id="multiCollapseExample4">
            <div class="col-md-6">  
                <div class="card card-body">
                    Téléchargement des fichiers: <br>
                    personnel <br>
                    paie <br>
                <div class="col-md-6 align-self-end">  
                    <a class="slide-item" href="<?php echo e(route('uploadFilesGET')); ?>" >Télécharger un fichier</a>
                  </div>
                </div>
            </div>
       
      </div>

       </div>
    </div>
 </div>
 <div class="step">
    <div>
        <div class="title"><h3>Troisieme Etape</h3> </div>
    <div>
       <button class="btn btn-primary" 
       type="button" data-toggle="collapse" 
       data-target="#multiCollapseExample5" 
       aria-expanded="false" 
       aria-controls="multiCollapseExample5" onclick="myFunction5()">
       Simultaion</button>

      <div class="caption"> <br>
          <div class="collapse" id="multiCollapseExample5">
         
           <div class="col-md-6">  
               <div class="card card-body">
                Créer Une Simulation <br>
                personnel <br>
                paie <br>
               <div class="col-md-6 align-self-end">  
                <a class="slide-item" href="<?php echo e(route('simulationsGET')); ?>" >Simulations</a>
                </div>
               </div>
           </div>
      
     </div>

      </div>

    </div>
 </div>
 <div class="step">
    <div>
        <div class="title"><h3>Consulter </h3> </div>

    </div>
    <div>

        <button class="btn btn-primary" 
        type="button" data-toggle="collapse" 
        data-target="#multiCollapseExample6" 
        aria-expanded="false" 
        aria-controls="multiCollapseExample7" onclick="myFunction6()">
        Evénements Générés</button>
        <button class="btn btn-primary" 
        type="button" data-toggle="collapse" 
        data-target="#multiCollapseExample7" 
        aria-expanded="false" 
        aria-controls="multiCollapseExample7" onclick="myFunction7()">
        Historique des fichiers </button>

       <div class="caption"> <br>
           <div class="collapse" id="multiCollapseExample6">
            <div class="col-md-6">  
                <div class="card card-body">
                    Evénements Générés suite aux simulations <br>
                <div class="col-md-6 align-self-end">  
                 <a class="slide-item" href="<?php echo e(route('eventsGET')); ?>" >Evenements</a>
                  </div>
                </div>
            </div>
            </div>
       </div>

<!--Transaction -->
       <div class="caption"> <br>
        <div class="collapse" id="multiCollapseExample7">
         <div class="col-md-6">  
             <div class="card card-body">
                 Ensemble des fichiers téléchargés: <br>
                
             <div class="col-md-6 align-self-end">  
                <a class="slide-item" href="<?php echo e(route('transactionsGET')); ?>" >Transactions</a>
            </div>
             </div>
         </div>
         </div>
    </div>
    </div>
 </div>

</div>
</div>

<!--Partie scénarii-->
<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-info-transparent">
    
       SCENARII
       <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('liste contacts')): ?>
       <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'postesdepense'))); ?>">Créer un evènnement  </a>
       </li>

       <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'scenarii'))); ?>">Créer un scenario  </a>
       </li>
   <?php endif; ?> 
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
   
    <!--Internal  index js -->
    <script src="<?php echo e(URL::asset('assets/js/index.js')); ?>"></script>

    <script>
function myFunction1() {
$("#multiCollapseExample2").collapse('hide');
$("#multiCollapseExample3").collapse('hide');
$("#multiCollapseExample4").collapse('hide');
$("#multiCollapseExample5").collapse('hide');
$("#multiCollapseExample6").collapse('hide');
$("#multiCollapseExample7").collapse('hide');
}
function myFunction2() {
$("#multiCollapseExample1").collapse('hide');
$("#multiCollapseExample3").collapse('hide');
$("#multiCollapseExample4").collapse('hide');
$("#multiCollapseExample5").collapse('hide');
$("#multiCollapseExample6").collapse('hide');
$("#multiCollapseExample7").collapse('hide');
}
function myFunction3() {
$("#multiCollapseExample1").collapse('hide');
$("#multiCollapseExample2").collapse('hide');
$("#multiCollapseExample4").collapse('hide');
$("#multiCollapseExample5").collapse('hide');
$("#multiCollapseExample6").collapse('hide');
$("#multiCollapseExample7").collapse('hide');
}

function myFunction4() {
$("#multiCollapseExample2").collapse('hide');
$("#multiCollapseExample3").collapse('hide');
$("#multiCollapseExample1").collapse('hide');
$("#multiCollapseExample5").collapse('hide');
$("#multiCollapseExample6").collapse('hide');
$("#multiCollapseExample7").collapse('hide');
}
function myFunction5() {
$("#multiCollapseExample1").collapse('hide');
$("#multiCollapseExample3").collapse('hide');
$("#multiCollapseExample4").collapse('hide');
$("#multiCollapseExample2").collapse('hide');
$("#multiCollapseExample6").collapse('hide');
$("#multiCollapseExample7").collapse('hide');
}
function myFunction6() {
$("#multiCollapseExample1").collapse('hide');
$("#multiCollapseExample2").collapse('hide');
$("#multiCollapseExample4").collapse('hide');
$("#multiCollapseExample5").collapse('hide');
$("#multiCollapseExample3").collapse('hide');
$("#multiCollapseExample7").collapse('hide');
}
function myFunction7() {
$("#multiCollapseExample1").collapse('hide');
$("#multiCollapseExample2").collapse('hide');
$("#multiCollapseExample4").collapse('hide');
$("#multiCollapseExample5").collapse('hide');
$("#multiCollapseExample6").collapse('hide');
$("#multiCollapseExample3").collapse('hide');
}

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/soltana/Bureau/testold/Bookone/resources/views/home.blade.php ENDPATH**/ ?>