@extends('layouts.app')

@section('content')
    <div class="container grey">
        <h1>My Groups</h1>
        <p class="top-lead lead text-muted">An overview of all your gaming groups and their members.</p>

        @if (count($gameGroups) > 0)

            @foreach ($gameGroups as $gameGroup)
                <div class="row campaigns-overview">
                    <div class="col-xs-12">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">{{ $gameGroup->getName() }}</h2>
                            </div>

                            <div class="panel-body">
                                <div class="row hidden-xs">
                                    <div class="col-sm-3">
                                        <strong>Member Name</strong>
                                    </div>
                                    <div class="col-sm-2">
                                        <strong>Added</strong>
                                    </div>
                                    <div class="col-sm-2 text-center">
                                        <strong>Campaigns</strong>
                                    </div>
                                    <div class="col-sm-5">
                                        <strong>Played Heroes</strong>
                                    </div>
                                </div>
                                @foreach ($gameGroup->gameGroupMembers as $gameGroupMember)
                                    <div class="row campaign-row">
                                        <div class="col-sm-3 text-margin">{{ $gameGroupMember->getName() }}</div>

                                        <div class="col-sm-2 text-margin">{{ $gameGroupMember->created_at }}</div>

                                        <div class="col-sm-2 text-center text-margin">TODO</div>

                                        <div class="col-sm-5">TODO</div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="panel-footer">
                                <a href="mygroups_edit.php?grpID=519" class="btn btn-primary ">Edit Group / Add
                                    Members</a>
                            </div>

                        </div>

                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
