@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Created Projects
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif
                </div>

                <div class="card-body">
                    <div>
                      <?php

                        $user = Auth::user();
                        //print($user->name);
                        $projectNames = DB::table('projects')->where('voditelj_projekta', $user->email)->pluck('naziv_projekta');
                        $size = sizeof($projectNames);
                        

                        for($i=0; $i<$size; $i++){
                          print_r($projectNames[$i]);
                          echo("<br>");
                        }
                      ?>
                    </div>

                    <div class="links"><br>
                          <a href="/newProject">New project</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
