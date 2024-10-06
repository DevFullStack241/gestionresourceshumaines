<div>

    <div class="profile-tab height-100-p">
        <div class="tab height-100-p">
            <ul class="nav nav-tabs customtab" role="tablist">
                <li class="nav-item">
                    <a wire:click.prevent='selectTab("personal_details")'
                        class="nav-link {{ $tab == 'personal_details' ? 'active' : '' }}" data-toggle="tab"
                        href="#personal_details" role="tab">Données personnelles</a>
                </li>
                <li class="nav-item">
                    <a wire:click.prevent='selectTab("update_password")'
                        class="nav-link {{ $tab == 'update_password' ? 'active' : '' }}" data-toggle="tab"
                        href="#update_password" role="tab">Mettre à jour le mot de passe</a>
                </li>
            </ul>
            <div class="tab-content">
                <!-- Timeline Tab start -->
                <div class="tab-pane fade {{ $tab == 'personal_details' ? 'active show' : '' }}" id="personal_details"
                    role="tabpanel">
                    <div class="pd-20">
                        <form wire:submit='updateAdminPersonalDetails()'>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nom</label>
                                        <input type="text" class="form-control" wire:model.live='name'
                                            placeholder="Enter full name">
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" wire:model.live='email'
                                            placeholder="Enter email">
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nom d'utilisateur</label>
                                        <input type="text" class="form-control" wire:model.live='username'
                                            placeholder="Enter username">
                                        @error('username')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
                <!-- Timeline Tab End -->
                <!-- Tasks Tab start -->
                <div class="tab-pane fade {{ $tab == 'update_password' ? 'active show' : '' }}" id="update_password"
                    role="tabpanel">
                    <div class="pd-20 profile-task-wrap">
                        <form wire:submit='updatePassword()'>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Mot de passe actuel</label>
                                        <input type="password" placeholder="Mot de passe actuel"
                                            wire:model='current_password' class="form-control">
                                        @error('current_password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nouveau mot de passe</label>
                                        <input type="password" placeholder="Nouveau mot de passe"
                                            wire:model='new_password' class="form-control">
                                        @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Confirmer le mot de passe</label>
                                        <input type="password" placeholder="Tapez le nouveau mot de passe"
                                            wire:model='new_password_confirmation' class="form-control">
                                        @error('new_password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </form>
                    </div>
                </div>
                <!-- Tasks Tab End -->

            </div>
        </div>
    </div>

</div>
