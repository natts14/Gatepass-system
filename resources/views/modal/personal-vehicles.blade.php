<div class="modal fade bd-example-modal-lg" id="vehicleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ADD VEHICLE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <label class="font-weight-bold">PLATE NUMBER</label>
                            <input type="text" name="vehicle_plate_number" class="form-control" id="plateNo" required>
                        </div>

                        <div class="form-group col-sm-4">
                            <label class="font-weight-bold">VEHICLE REGISTRATION NO.</label>
                            <input type="text" name="vehicle_registration_number" class="form-control" id="vehicleRegistrationNo" required>
                        </div>

                        <div class="form-group col-sm-4">
                            <label class="font-weight-bold">EXPIRY DATE</label>
                            <!-- <form action="/action_page.php"> -->
                            <input class="form-control" type="date" id="birthday" name="vehicle_registration_expiry">
                            <!-- </form> -->
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <label class="font-weight-bold">DOCUMENTS</label><br>
                            <button type="button" class="btn btn-default btn-sm" name="licenseDocu"></button><i class="fas fa-paperclip"></i></button>
                            <button type="button" class="btn btn-default btn-sm "></button><i class="fas fa-paperclip"></i></button>
                        </div>

                        <div class="form-group col-sm-4">
                            <label class="font-weight-bold">TYPE</label>
                            <select class="form-control mb-2" name="type" value="" id="vehicleType" placeholder="type" required>
                                <option></option>
                                <option value="vehicle">VEHICLE</option>
                                <option value="motercycle">MOTORCYCLE</option>
                            </select>
                        </div>

                        <div class="form-group col-sm-4">
                            <label class="font-weight-bold">MODEL</label>
                            <input type="text" name="model" value="" class="form-control" id="vehicleModel" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <label class="font-weight-bold">COLOR</label>
                            <input type="text" name="color" value="" class="form-control" id="vehicleColor" required>
                        </div>

                        <div class="form-group col-sm-4">
                            <label class="font-weight-bold">RFID</label><br>
                            <input type="text" name="rfid" value="" class="form-control" id="RFID" maxlength="10" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>