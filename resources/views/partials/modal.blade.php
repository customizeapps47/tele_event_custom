<div class="card-body">
    <div class="demo-inline-spacing">
        <div class="form-modal-ex">
            <!-- Modal -->
            <div class="modal  fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-top modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Register New Notification</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="reg_notification" action="{{config('app.url')}}" method="POST">
                            @sessionToken
                            <div class="modal-body">
                                <div class="form-group pt-2">
                                        <label for="registration_for">Registration notification for chanel:</label>
                                        <span class="text-danger">*</span> 
                                        
                                        <select class="form-control" name="registration_for" id="registration_for" required>
                                            <option value="">Choose one</option>
                                            <option value="customers/create">customers/create</option>
                                            <option value="customers/disable">customers/disable</option>
                                            <option value="customers/enable">customers/enable</option>
                                            <option value="customers/update">customers/update</option>
                                        </select>
                                </div>
                                <div class="form-group pt-2">
                                    <label>Telegroup ID: </label>
                                    <span class="text-danger">*</span>
                                    <a href="" class="text-warning">(how to get id group telegram)</a>
                                    <textarea class="form-control" id="tele_id" name="tele_id" rows="3" placeholder="Enter id group telegram"></textarea>
                                </div>

                                <div class="demo-inline-spacing">
                                        <div class="custom-control custom-control-success custom-radio">
                                            <input type="radio" id="enable" name="status" class="custom-control-input" checked />
                                            <label class="custom-control-label" for="enable">Enable</label>
                                        </div>
                                        <div class="custom-control custom-control-success custom-radio">
                                            <input type="radio" id="disable" name="status" class="custom-control-input" />
                                            <label class="custom-control-label" for="disable">Disable</label>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="btn-reg-notifi">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>