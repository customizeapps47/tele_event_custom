<!-- BEGIN: Body-->

    <!-- BEGIN: Content-->
    <div class="p-4">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <!-- Table Hover Animation start -->
                <div class="row" id="table-hover-animation">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Notification setting</h4>
                                <button type="button" class="btn btn-sm btn-gradient-primary " data-toggle="modal" data-target="#inlineForm">Register Telegram Notification</button>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-success">
                                Receive notifications of customer actions via telegram.
                                </p>
                                <p class="card-text text-warning">
                                    Supported : <span class="text-success">customers/create, customers/disable, customers/enable, customers/update</span>
                                </p>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover-animation">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name Chanel</th>
                                            <th>Tele Id</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($slacks->count() > 0)
                                            @foreach ($slacks as $slack)
                                            <tr>
                                                <td>{{$loop->index}}</td>
                                                <td>{{$slack->registration_for}}</td>
                                                <td>{{$slack->tele_id}}</td>
                                                @if ($slack->status)
                                                <td><span class="badge badge-pill badge-light-success mr-1">Active</span></td>
                                                @else
                                                <td><span class="badge badge-pill badge-light-danger mr-1">Deactivate</span>
                                                </td>
                                                @endif
                                                <td>
                                                    <button type="button" id="btn-edit" data-id="{{$slack}}"
                                                        class="btn btn-sm btn-gradient-warning" >Edit</button>
                                                    <button type="button" data-id="{{$slack->id}}" data-url="{{config('app.url')}}"
                                                        class="btn btn-sm  btn-gradient-danger" id="btn-destroy">Delete</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <td>Nothing setup</span>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Table head options end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
<!-- END: Body-->