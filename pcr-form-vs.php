    <div class="panel-body">
                <div class="form-row">
                                        <div class="form-group col-md-6">
                                                <label>Time</label>
                                                <input type="time" class="form-control" name= "time_vs" id="time_vs">
                                        </div>
                                        <div class="form-group col-md-6">
                                                <label for="inputPassword4">Blood Pressure</label>
                                                <input type="text" class="form-control" name= "bp" id="bp">
                                        </div>
                                 </div>
                                 <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label>Pulse Rate</label>
                                                <input type="text" class="form-control" name= "pr" id="pr" >
                                        </div>
                                        <div class="form-group col-md-3">
                                                <label for="inputPassword4">Risk ratio</label>
                                                <input type="text" class="form-control" name= "rr" id="rr" ">
                                        </div>
                                        <div class="form-group col-md-3">
                                                <label>Temperature</label>
                                                <input type="text" class="form-control" name= "temp" id="temp">
                                        </div>
                                        <div class="form-group col-md-3">
                                                <label for="inputPassword4">02 Stat</label>
                                                <input type="text" class="form-control" name= "stat" id="stat">
                                        </div>
                                 </div>
                                 <hr>
                                  <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="select" class=" form-control-label">Eye</label>
                                                <select name="eye" id="eye" class="form-control-lg form-control sum-selector">
                                                    <option value=""> </option>
                                                    <option value="4">4</option>
                                                    <option value="3">3</option>
                                                    <option value="2">2</option>
                                                    <option value="1">1</option>
                                                </select>
                                        </div>
                                         <div class="col col-md-4">
                                            <label for="select" class=" form-control-label">Verbal</label>
                                                <select name="verbal" id="verbal" class="form-control-lg form-control sum-selector">
                                                    <option value=""> </option>
                                                    <option value="5">5</option>
                                                    <option value="4">4</option>
                                                    <option value="3">3</option>
                                                    <option value="2">2</option>
                                                    <option value="1">1</option>
                                                </select>
                                        </div>
                                        <div class="col col-md-4">
                                            <label for="select" class=" form-control-label">Motor</label>
                                                <select name="motor" id="motor" class="form-control-lg form-control sum-selector">
                                                    <option value=""> </option>
                                                    <option value="6">6</option>
                                                    <option value="5">5</option>
                                                    <option value="4">4</option>
                                                    <option value="3">3</option>
                                                    <option value="2">2</option>
                                                    <option value="1">1</option>
                                                </select>
                                        </div>
                                    </div> 
                                    <div class="form-row">
                                        <div class="input-group">
                                              <span class="input-group-btn">
                                                <button class="btn btn-default btn-primary" id="total" type="button">Total</button>
                                              </span>
                                              <input type="text" class="form-control col-md-3 ml-2" name="total" id="total_input" readonly="">
                                            </div>
                                 </div>
                <div align="center">
                    <button type="button" name="btn_personal_info" id="btn_prev_vs" class="btn btn-secondary btn">
                            Previous
                    </button>
                    <button type="button" name="btn_personal_info" id="btn_next_vs" class="btn btn-info btn">
                            Next
                    </button>
                </div> 


        </div>