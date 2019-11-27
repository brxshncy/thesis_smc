<div class="panel-body">
                <div class="form">
                        <div class="form-group">
                            <label>General Impression</label>
                            <input type="text" class="form-control" name= "impression" id="impression">
                        </div>
                </div>
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Relation to Patient</label>
                            <input type="text" class="form-control" name= "r_p1" id="contact1">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Contact Number</label>
                            <input type="text" class="form-control" name= "contact1" id="contact1">
                        </div>
                </div>
                <div class="row form-group">
                        <div class="col col-md-6">
                            <label for="select" class=" form-control-label">Nature of Incident</label>
                                <select name="nature" id="nature" class="form-control-lg form-control">
                                    <option value=""></option>
                                    <option value="Medical">Medical</option>
                                    <option value="Trauma">Trauma</option>
                                    <option value="Fire Response">Fire Response</option>
                                    <option value="V A">V A</option>
                                    <option value="Activity Event">Activity Event</option>
                                </select>
                        </div>
                        <div class="col col-md-6">
                            <label for="select" class=" form-control-label">Neuro</label>
                                <select name="neuro" id="neuro" class="form-control-lg form-control">
                                    <option value=""></option>
                                    <option value="Alert">Alert</option>
                                    <option value="Oriented">Oriented</option>
                                    <option value="Confused">Confused</option>
                                    <option value="Unresponsive">Unresponsive</option>
                                </select>
                        </div>
                </div>

                <div class="form-row">
                        <div class="form-group col-md-2">
                                <label>Call Recieve</label>
                                <input type="time" class="form-control" name= "call_recieve" id="call_recieve">
                        </div>
                        <div class="form-group col-md-2">
                                <label for="inputPassword4">Unit Enroute</label>
                                <input type="time" class="form-control" name= "unit_enroute" id="unit_enroute">
                        </div>
                        <div class="form-group col-md-2">
                                <label for="inputPassword4">Arrive at Scene</label>
                                <input type="time" class="form-control" name= "arrive_scene" id="arrive_scene">
                        </div>
               
         
                        <div class="form-group col-md-2">
                                                <label for="inputPassword4">Time Left Scene</label>
                                                <input type="time" class="form-control" name= "left_scene" id="left_scene"  placeholder="" require">
                        </div>
                        <div class="form-group col-md-2">
                                                <label for="inputPassword4">Arrive at Destination</label>
                                                <input type="time" class="form-control" name= "arrive_destination" id="arrive_destination"  placeholder="" require">
                        </div>
                        <div class="form-group col-md-2">
                                                <label for="inputPassword4">Back In Service</label>
                                                <input type="time" class="form-control" name= "back_service" id="back_service"  placeholder="" require">
                                        </div>
                </div>
                <div class="row form-group">
                        <div class="col col-md-6">
                            <label for="select" class=" form-control-label">Airway</label>
                                <select name="airway" id="airway" class="form-control-lg form-control">
                                    <option value=""></option>
                                    <option value="Patent">Patent</option>
                                    <option value="Impaired">Impaired</option>
                                </select>
                        </div>
                        <div class="col col-md-6">
                            <label for="select" class=" form-control-label">Breathing</label>
                                <select name="breathing" id="breathing" class="form-control-lg form-control">
                                    <option value=""></option>
                                    <option value="Unlabored">Unlabored</option>
                                    <option value="Deep">Deep</option>
                                    <option value="Shallow">Shallow</option>
                                    <option value="Labored">Labored</option>
                                    <option value="Retraction">Retraction</option>
                                    <option value="Absent">Absent</option>
                                </select>
                        </div>
                </div>
                <div class="row form-group">
                        <div class="col col-md-6">
                            <label for="select" class=" form-control-label">Pupils</label>
                                <select name="pupils" id="pupils" class="form-control-lg form-control">
                                    <option value=""></option>
                                    <option value="Normal/Pearl">Normal/Pearl</option>
                                    <option value="Constritec(Left/Right)">Constritec(Left/Right)</option>
                                    <option value="Dilated(Left/Right)">Dilated(Left/Right)</option>
                                        <option value="No Reaction(Left/Right)">No Reaction(Left/Right)</option>
                                </select>
                        </div>
                        <div class="col col-md-6">
                            <label for="select" class=" form-control-label">Pulse</label>
                                <select name="pulse" id="pulse" class="form-control-lg form-control">
                                    <option value=""> </option>
                                    <option value="Normal">Normal</option>
                                    <option value="Strong">Strong</option>
                                    <option value="Weak">Weak</option>
                                    <option value="Irregular">Irregular</option>
                                    <option value="Regular">Regular</option>
                                </select>
                        </div>
                 </div>

                <div class="row form-group">
                        <div class="col col-md-4">
                            <label for="select" class=" form-control-label">Skin</label>
                                <select name="skin" id="skin" class="form-control-lg form-control">
                                    <option value=""> </option>
                                    <option value="Normal">Normal</option>
                                    <option value="Cyanotic">Cyanotic</option>
                                    <option value="Pale">Pale</option>
                                    <option value="Cold">Cold</option>
                                    <option value="Jaundice">Jaundice</option>
                                    <option value="Flushed">Flushed</option>
                                    <option value="Asthen">Asthen</option>
                                </select>
                        </div>
                        <div class="col col-md-4">
                            <label for="select" class=" form-control-label">Skin Type</label>
                                <select name="skin_texture" id="skin_texture" class="form-control-lg form-control">
                                    <option value=""></option>
                                    <option value="Normal">Normal</option>
                                    <option value="Moist">Moist</option>
                                    <option value="Dry">Dry</option>
                                    <option value="Disphoretic">Disphoretic</option>
                                </select>
                        </div>
                        <div class="col col-md-4">
                            <label for="select" class=" form-control-label">CRT</label>
                                <select name="crt" id="crt" class="form-control-lg form-control">
                                    <option value=""> </option>
                                    <option value="Prolonged(>2 seconds)">Prolonged(>2 seconds)</option>
                                    <option value="Normal(< 2 seconds)">Normal(< 2 seconds)</option>
                                </select>
                        </div>
                </div>
                <div align="center">
                    <button type="button" name="btn_personal_info" id="btn_prev_incident" class="btn btn-secondary btn">
                            Previous
                        </button>
                        <button type="button" name="btn_personal_info" id="btn_nxt_incident" class="btn btn-info btn">
                            Next
                        </button>
                    </div> 
                                   
        </div>