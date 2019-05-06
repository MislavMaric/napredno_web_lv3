@extends('layouts.app')

@section('title', 'Project Team')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dodaj članove tima</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="/createTeam">
                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                          Članovi tima: <br><br>
                          
                            <?php

                              $user = Auth::user();
                              //print($user->name);
                              $clanProjektnogTima = DB::table('users')->pluck('email');
                              
                              $currentUser = $user->email;
                             
                              

                              $size = sizeof($clanProjektnogTima);
                              //echo($size);


                              for($i=0; $i<$size; $i++){
                                if($currentUser == $clanProjektnogTima[$i]) {
                                  //echo("current: ");
                                  
                                } else {
                                 
                                  $idClanProjektnogTima = DB::table('users')->where('email', $clanProjektnogTima[$i])->pluck('id');
                                  $trimmedIdClanProjektnogTima = trim($idClanProjektnogTima, " []");
                                  //print($trimmedIdClanProjektnogTima);
                                 

                                  
                                  echo "<option value=" .$trimmedIdClanProjektnogTima. ">".$clanProjektnogTima[$i]."  </option><br>";

                                  
                                  }

                                }

                              
                              ?> 
                            
                            <?php

                              $user = Auth::user();
                              //print($user->name);
                              $clanProjektnogTima = DB::table('users')->pluck('email');
                              
                              $currentUser = $user->email;
                              

                              $size = sizeof($clanProjektnogTima);
                              //echo($size);

                              $counter = 0;

                              for($i=0; $i<$size; $i++){
                                if($currentUser == $clanProjektnogTima[$i]) {
                                 
                                } else {
                                  
                                  //print_r($moguciClanoviProjektnogTima);
                                  
                                  $counter++;

                                  $idClanProjektnogTima = DB::table('users')->where('email', $clanProjektnogTima[$i])->pluck('id');
                                  $trimmedIdClanProjektnogTima = trim($idClanProjektnogTima, " []");
                                  

                                  //echo "<option value=" .$trimmedIdClanProjektnogTima. " name=\"user_id\">".$clanProjektnogTima[$i]."  </option><br>";
                                  //echo "<option value=" .$trimmedIdClanProjektnogTima. ">".$clanProjektnogTima[$i]."  </option><br>";
                                  echo "<input type=\"checkbox\" name=\"user_id\" value=" .$trimmedIdClanProjektnogTima. ">" .$clanProjektnogTima[$i]."<br>";

                                  
                                  }

                                }


                              
                              ?>

                            <div>

                              <?php
                              // uzima zadnji element project_id
                                $idProjekta = DB::table('projects')->pluck('id');
                                //print($idProjekta);
                                $sizeId = sizeof($idProjekta);
                                
                                //print($idProjekta[$sizeId - 1]);
                               ?>

                              <input type="hidden" name="project_id" value="<?php print($idProjekta[$sizeId - 1]); ?>">
                            </div>
                        <div>
                           <input type="submit" name="submit">
                        </div>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')
