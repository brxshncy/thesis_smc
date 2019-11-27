  <div class="panel-body">
                  <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Signs and Symptoms</label>
                                        <input type="text" class="form-control" name="symtomps" id="symtomps">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Allergies</label>
                                        <input type="text" class="form-control" name="allergies" id="allergies">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Meds</label>
                                        <input type="text" class="form-control" name="meds" id="meds">
                                    </div>
                                 </div>
                                  <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Past Illness</label>
                                        <input type="text" class="form-control" name="past_ill" id="past_ill">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Last Oral Intake</label>
                                        <input type="text" class="form-control" name="oral_intake" id="oral_intake">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Time of Intake</label>
                                        <input type="text" class="form-control" name="time_oral" id="time_oral">
                                    </div>
                                 </div>
                                 <div class="form">
                                    <div class="form-group">
                                        <label>Events Prior</label>
                                        <input type="text" class="form-control" name="events_prior" id="events_prior">
                                    </div>
                                </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Onset</label>
                                        <input type="text" class="form-control" name="onset" id="onset">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Provocation</label>
                                        <input type="text" class="form-control" name="provocation" id="provocation">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Quality</label>
                                        <input type="text" class="form-control" name="quality" id="quality">
                                    </div>
                                 </div>
                                  <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Radiation</label>
                                        <input type="text" class="form-control" name="radiation" id="radiation">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Severity</label>
                                        <input type="text" class="form-control" name="severity" id="severity">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Timing</label>
                                        <input type="text" class="form-control" name="timing_i" id="timing_i">
                                    </div>
                                 </div>
                                 <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="select" class=" form-control-label">Trauma Case</label>
                                                <select name="trauma" id="etraumaye" class="form-control-lg form-control">
                                                    <option value=""></option>
                                                    <option value="Alcohol Intoxication">Alcohol Intoxication</option>
                                                    <option value="Animal Bite">Animal Bite</option>
                                                    <option value="Drowning">Drowning</option>
                                                    <option value="Electrocution">Electrocution</option>
                                                    <option value="Fall">Fall</option>
                                                    <option value="Gunshot Wound">Gunshot Wound</option>
                                                    <option value="Hit and run">Hit and run</option>
                                                    <option value="Mauling">Mauling</option>
                                                    <option value="Stab Wound">Stab Wound</option>
                                                </select>
                                        </div>
                                         <div class="col col-md-4">
                                            <label for="select" class=" form-control-label">Burn(%TBSA)</label>
                                                <select name="burn" id="burn" class="form-control-lg form-control">
                                                    <option value=""></option>
                                                    <option value="First Degree">First Degree</option>
                                                    <option value="Second Degree">Second Degree</option>
                                                    <option value="Superficial">Superficial</option>
                                                    <option value="Deep">Deep</option>
                                                </select>
                                        </div>
                                        <div class="col col-md-4">
                                            <label for="select" class=" form-control-label">Treatment</label>
                                                <select name="treatment" id="treatment" class="form-control-lg form-control">
                                                    <option value=""></option>
                                                    <option value="Airway Conduct">Airway Conduct</option>
                                                    <option value="Abdominal Thrus">Abdominal Thrust</option>
                                                    <option value="Bandaging">Bandaging</option>
                                                    <option value="Burn Care">Burn Care</option>
                                                    <option value="Cold Application">Cold Application</option>
                                                    <option value="Defibrillation">Defibrillation</option>
                                                    <option value="Extrication">Extrication</option>
                                                    <option value="Rescue Breathing">Rescue Breathing</option>
                                                    <option value="Nebulization">Nebulization</option>
                                                    <option value="Oxygen">Oxygen</option>
                                                    <option value="Spine Immobilization">Spine Immobilization</option>
                                                    <option value="Suctioning">Suctioning</option>
                                                    <option value="Spliting/Traction">Spliting/Traction</option>
                                                    <option value="VS Checked">VS Checked</option>
                                                    <option value="Wound Cleaning/Dressing">Wound Cleaning/Dressing</option>
                                                    <option value="CPR">CPR</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="form">
                                        <div class="form-group">
                                            <label>Narratives</label>
                                              <textarea name="narrative" id="narrative" rows="9" placeholder="Write Narratives.." class="form-control"></textarea>
                                    </div>
                                </div>
                                 <div align="center">
                    <button type="button" name="btn_personal_info" id="btn_prev_assesment" class="btn btn-secondary btn">
                            Previous
                    </button>
                    <button type="button" name="btn_personal_info" id="btn_nxt_assesment" class="btn btn-info btn">
                            Next
                    </button>
                </div> 
            </div>