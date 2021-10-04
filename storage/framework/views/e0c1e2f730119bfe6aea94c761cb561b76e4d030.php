

<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
     
            <h2 >BookOne</h2>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround"
                        src="<?php echo e(URL::asset('assets/img/faces/6.jpg')); ?>"><span
                        class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0"><?php echo e(Auth::user()->name); ?></h4>
                    <span class="mb-0 text-muted"><?php echo e(Auth::user()->email); ?></span>
                </div>
            </div>
        </div>
        <ul class="side-menu">
           
            <li class="slide">
                <a class="side-menu__item" href="<?php echo e(url('/' . ($page = 'home'))); ?>"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path
                            d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                    </svg><span class="side-menu__label">Dashboard</span></a>
            </li>

          

           

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contacts')): ?>
            <li class="side-item side-item-category">Mes Contacts</li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('/' . ($page = '#'))); ?>"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M4 12c0 4.08 3.06 7.44 7 7.93V4.07C7.05 4.56 4 7.92 4 12z" opacity=".3" />
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93s3.05-7.44 7-7.93v15.86zm2-15.86c1.03.13 2 .45 2.87.93H13v-.93zM13 7h5.24c.25.31.48.65.68 1H13V7zm0 3h6.74c.08.33.15.66.19 1H13v-1zm0 9.93V19h2.87c-.87.48-1.84.8-2.87.93zM18.24 17H13v-1h5.92c-.2.35-.43.69-.68 1zm1.5-3H13v-1h6.93c-.04.34-.11.67-.19 1z" />
                    </svg><span class="side-menu__label">Mes Contacts</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('liste contacts')): ?>
                        <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'contacts'))); ?>">Liste des contacts</a>
                        </li>
                    <?php endif; ?>                   
                </ul>
            </li>
        <?php endif; ?>
      

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('utilisateurs')): ?>
                <li class="side-item side-item-category">Utilisateurs</li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('/' . ($page = '#'))); ?>"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3" />
                            <path
                                d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z" />
                        </svg><span class="side-menu__label">Utilisateurs</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('liste utilisateurs')): ?>
                            <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'users'))); ?>"> Liste des utilisateurs</a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permissions utilisateurs')): ?>
                            <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'roles'))); ?>"> Permissions des utilisateurs</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>


            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contacts')): ?>
            <li class="side-item side-item-category">Menu Configurations</li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('/' . ($page = '#'))); ?>"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M4 12c0 4.08 3.06 7.44 7 7.93V4.07C7.05 4.56 4 7.92 4 12z" opacity=".3" />
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93s3.05-7.44 7-7.93v15.86zm2-15.86c1.03.13 2 .45 2.87.93H13v-.93zM13 7h5.24c.25.31.48.65.68 1H13V7zm0 3h6.74c.08.33.15.66.19 1H13v-1zm0 9.93V19h2.87c-.87.48-1.84.8-2.87.93zM18.24 17H13v-1h5.92c-.2.35-.43.69-.68 1zm1.5-3H13v-1h6.93c-.04.34-.11.67-.19 1z" />
                    </svg><span class="side-menu__label">Configurations</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">

                     

                   
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('liste contacts')): ?>
                        <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'zones'))); ?>">Zones </a>
                        </li>
                    <?php endif; ?> 
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('liste contacts')): ?>
                        <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'pays'))); ?>">Pays  </a>
                        </li>
                    <?php endif; ?> 
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('liste contacts')): ?>
                        <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'regions'))); ?>">Regions  </a>
                        </li>
                    <?php endif; ?>   
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('liste contacts')): ?>
                    <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'departements'))); ?>">Départements  </a>
                    </li>
                    <?php endif; ?>  
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('liste contacts')): ?>
                    <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'etablissements'))); ?>">Etablissements  </a>
                    </li>
                    <?php endif; ?>      
                    
                    

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('liste contacts')): ?>
                    <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'categories_professionnel'))); ?>">Catégories Professionnel  </a>
                    </li>
                    <?php endif; ?> 
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('liste contacts')): ?>
                    <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'filieres_metiers'))); ?>">Filieres Metiers  </a>
                    </li>
                    <?php endif; ?> 
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('liste contacts')): ?>
                    <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'contacts'))); ?>">Sous Filieres Metiers  </a>
                    </li>
                    <?php endif; ?> 
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('liste contacts')): ?>
                    <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'contacts'))); ?>"> Metiers  </a>
                    </li>
                    <?php endif; ?> 
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('liste contacts')): ?>
                    <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'contacts'))); ?>"> JOB  </a>
                    </li>
                    <?php endif; ?> 
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('liste contacts')): ?>
                    <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'contacts'))); ?>"> Postes  </a>
                    </li>
                    <?php endif; ?> 


                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('liste contacts')): ?>
                    <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'contacts'))); ?>"> NineBox  </a>
                    </li>
                    <?php endif; ?> 
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('liste contacts')): ?>
                    <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'contacts'))); ?>"> MOI/MOD  </a>
                    </li>
                    <?php endif; ?> 
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('liste contacts')): ?>
                    <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'contacts'))); ?>">  Contrats  </a>
                    </li>
                    <?php endif; ?> 



                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('liste contacts')): ?>
                    <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'contacts'))); ?>"> Conges  </a>
                    </li>
                    <?php endif; ?> 
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('liste contacts')): ?>
                    <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'contacts'))); ?>"> Diplomes  </a>
                    </li>
                    <?php endif; ?> 
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('liste contacts')): ?>
                    <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'contacts'))); ?>"> Handicapes  </a>
                    </li>
                    <?php endif; ?> 

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('liste contacts')): ?>
                    <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'contacts'))); ?>">Type- charges-famille  </a>
                    </li>
                    <?php endif; ?> 
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('liste contacts')): ?>
                    <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'contacts'))); ?>"> langues  </a>
                    </li>
                    <?php endif; ?> 
                    

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('liste contacts')): ?>
                    <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'contacts'))); ?>">Niveau d'Orga  </a>
                    </li>
                    <?php endif; ?> 
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('liste contacts')): ?>
                    <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'contacts'))); ?>"> Niveau de JOB  </a>
                    </li>
                    <?php endif; ?> 
                    

                </ul>
            </li>
        <?php endif; ?>









           















        </ul>
    </div>
</aside>
<!-- main-sidebar -->
<?php /**PATH /home/soltana/Bureau/off/Bookone/resources/views/layouts/main-sidebar.blade.php ENDPATH**/ ?>