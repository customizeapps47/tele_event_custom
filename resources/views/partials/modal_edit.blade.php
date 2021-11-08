<div class="card-body">
    <div class="demo-inline-spacing">
        <div class="form-modal-ex">
            <!-- Modal -->
            <div class="modal  fade text-left" id="modal-edit-form" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-top modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Update Notification</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="update_notification" action="{{config('app.url')}}" method="POST">
                        @sessionToken
                            <div class="modal-body">
                                <input type="hidden" name="id" value="">
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
                                    <label>Webhook link: </label>
                                    <span class="text-danger">*</span>
                                    <a href="" class="text-warning">(how to get webhook link from slack)</a>
                                    <textarea class="form-control" id="webhook_link" name="tele_id" rows="3" required placeholder="Enter webhook link"></textarea>
                                </div>

                                <div class="demo-inline-spacing">
                                    <div class="form-group">
                                        <label>Status: </label>
                                        <span class="text-danger">*</span>
                                        <select class="form-control" name="status" id="status" required>
                                            <option value="1" selected>Enable</option>
                                            <option value="0">Disable</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="btn-update-notifi">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>