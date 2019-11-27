  <?php 
 $team = "
    SELECT t.unit_name AS team, CONCAT(r.firstname,' ',r.lastname) AS team_leader
    FROM rescuers r LEFT JOIN unit_name t ON r.team_unit = t.id 
    WHERE r.team_unit = '$team_id' AND role = 'Team Leader'";
    $qry_team = $conn->query($team) or trigger_error(mysqli_error($conn)." ".$team);
    $res = mysqli_fetch_assoc($qry_team);

    $transport_officer = "SELECT  CONCAT(r.firstname,' ',r.lastname) AS transport_officer
    FROM rescuers r LEFT JOIN unit_name t ON r.team_unit = t.id 
    WHERE r.team_unit = '$team_id' AND role = 'Transport Officer'";
    $qry_transport = $conn->query($transport_officer) or trigger_error($conn." ".$transport_officer);
    $res1 = mysqli_fetch_assoc($qry_transport);

    $treatment_officer = "SELECT  CONCAT(r.firstname,' ',r.lastname) AS treatment_officer
    FROM rescuers r LEFT JOIN unit_name t ON r.team_unit = t.id 
    WHERE r.team_unit = '$team_id' AND role = 'Treatment Officer'";
    $qry_treatment = $conn->query($treatment_officer) or trigger_error($conn." ".$treatment_officer);
    $res2 = mysqli_fetch_assoc($qry_treatment);

    $members = "SELECT COUNT(role) as member
    FROM rescuers r LEFT JOIN unit_name t ON r.team_unit = t.id 
    WHERE  r.team_unit = '$team_id' AND role = 'Member'";
    $qry_members = $conn->query($members) or trigger_error($conn." ".$members);
    $res3 = mysqli_fetch_assoc($qry_members);
?>
  <div class="row form-group mt-4">
                    <div class="form-group col-md-3">
                        <label>Team Name</label>
                        <input type="text"  id="team" class="form-control text-center" value="<?php echo $res['team'] ?>" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Team Leader</label>
                        <input type="text" name="team_leader" id="team_leader" 
                        value="<?php echo (isset($res['team_leader']) && !empty($res['team_leader'])) ? $res['team_leader'] : 'Not yet assigned' ?>" class="form-control text-center" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Transport Officer</label>
                        <input type="text" name="transport_officer" id="transport_officer" 
                        value="<?php echo (isset($res1['transport_officer']) && !empty($res1['transport_officer'])) ? $res1['transport_officer'] : 'Not yet assigned' ?>" class="form-control text-center" readonly>
                    </div>
                     <div class="form-group col-md-3">
                        <label>Treatment Officer</label>
                        <input type="text" name="treatment_officer" id="treatment_officer" 
                        value="<?php echo (isset($res2['treatment_officer']) && !empty($res2['treatment_officer'])) ? $res2['treatment_officer'] : 'Not yet assigned' ?>" class="form-control text-center" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group col-md-2">
                        <label>Members</label>
                        <input type="text" 
                        value="<?php echo (isset($res3['member']) && !empty($res3['member'])) ? $res3['member'] : 'No members yet' ?>" class="form-control text-center" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h3>Team Response Mode</h3>
                    </div>
                </div>
                <div class="row form-group mt-4">
                                    <div class="col col-md-4">
                                        <label>Destination Determination</label>
                                        <select name="desti_deter" class="form-control-lg form-control">
                                            <option value=""></option>
                                            <option value="Closest Facility">Closest Facility</option>
                                            <option value="Patient's Choice">Patient's Choice</option>
                                            <option value="Family's Choice">Family's Choice</option>
                                            <option value="Medical Direction">Medical Direction</option>
                                            <option value="Law Enforcement Choice">Law Enforcement Choice</option>
                                            <option value="Protocol">Protocol</option>
                                        </select>
                                    </div>
                                    <div class="col col-md-4">
                                        <label>Responsode mode</label>
                                        <select name="response_mode" class="form-control-lg form-control">
                                            <option value=""></option>
                                            <option value="No Lights and Siren">No Lights and Siren</option>
                                            <option value="Lights Only">Lights Only</option>
                                            <option value="Lights and Siren">Lights and Siren</option>
                                        </select>
                                    </div>
                                    <div class="col col-md-4">
                                        <label>Transport Mode</label>
                                        <select name="transport_mode" class="form-control-lg form-control">
                                            <option value=""></option>
                                            <option value="No Lights and Siren">No Lights and Siren</option>
                                            <option value="Lights Only">Lights Only"</option>
                                            <option value="Lights and Siren">Lights and Siren</option>
                                            <option value="Upgraded to Light and Siren">Upgraded to Light and Siren</option>
                                        </select>
                                </div>
                            </div>