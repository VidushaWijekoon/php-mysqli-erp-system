   <div class="row">
                        <label class="col-sm-4 col-form-label text-capitalize">Mouse Pad</label>
                        <?php if($mousepad == null){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c1" name="mousepad" value="0">
                                <label for="c1" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c2" name="mousepad" value="1">
                                <label for="c2">No </label>
                            </div>
                        </div>
                        <?php }elseif($mousepad == 0){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c1" name="mousepad" value="0" checked="checked">
                                <label for="c1" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c2" name="mousepad" value="1">
                                <label for="c2">No </label>
                            </div>
                        </div>
                        <?php }elseif($mousepad == 1){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c1" name="mousepad" value="0">
                                <label for="c1" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c2" name="mousepad" value="1" checked="checked">
                                <label for="c2">No </label>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label text-capitalize">Mouse Pad Button</label>
                        <?php if($mouse_pad_button == null){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c3" name="mouse_pad_button" value="0">
                                <label for="c3" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c4" name="mouse_pad_button" value="1">
                                <label for="c4">No </label>
                            </div>
                        </div>
                        <?php }elseif($mouse_pad_button == 0){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c3" name="mouse_pad_button" value="0" checked="checked">
                                <label for="c3" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c4" name="mouse_pad_button" value="1">
                                <label for="c4">No </label>
                            </div>
                        </div>
                        <?php }elseif($mouse_pad_button == 1){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c3" name="mouse_pad_button" value="0">
                                <label for="c3" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c4" name="mouse_pad_button" value="1" checked="checked">
                                <label for="c4">No </label>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label text-capitalize">Camera Cable</label>
                        <?php if($camera_cable == null){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c5" name="camera_cable" value="0">
                                <label for="c5" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c6" name="camera_cable" value="1">
                                <label for="c6">No </label>
                            </div>
                        </div>
                        <?php }elseif($camera_cable == 0){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c5" name="camera_cable" value="0" checked="checked">
                                <label for="c5" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c6" name="camera_cable" value="1">
                                <label for="c6">No </label>
                            </div>
                        </div>
                        <?php }elseif($camera_cable == 1){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c5" name="camera_cable" value="0">
                                <label for="c5" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c6" name="camera_cable" value="1" checked="checked">
                                <label for="c6">No </label>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label text-capitalize">Back Cover</label>
                        <?php if($back_cover == null){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c7" name="back_cover" value="0">
                                <label for="c7" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c8" name="back_cover" value="1">
                                <label for="c8">No </label>
                            </div>
                        </div>
                        <?php }elseif($back_cover == 0){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c7" name="back_cover" value="0" checked="checked">
                                <label for="c7" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c8" name="back_cover" value="1">
                                <label for="c8">No </label>
                            </div>
                        </div>
                        <?php }elseif($back_cover == 1){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c7" name="back_cover" value="0">
                                <label for="c7" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c8" name="back_cover" value="1" checked="checked">
                                <label for="c8">No </label>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label text-capitalize">WIFI Card</label>
                        <?php if($wifi_card == null){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c9" name="wifi_card" value="0">
                                <label for="c9" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c10" name="wifi_card" value="1">
                                <label for="c10">No </label>
                            </div>
                        </div>
                        <?php }elseif($wifi_card == 0){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c9" name="wifi_card" value="0" checked="checked">
                                <label for="c9" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c10" name="wifi_card" value="1">
                                <label for="c10">No </label>
                            </div>
                        </div>
                        <?php }elseif($wifi_card == 1){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c9" name="wifi_card" value="0">
                                <label for="c9" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c10" name="wifi_card" value="1" checked="checked">
                                <label for="c10">No </label>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label text-capitalize">LCD Cable</label>
                        <?php if($lcd_cable == null){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c11" name="lcd_cable" value="0">
                                <label for="c11" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c12" name="lcd_cable" value="1">
                                <label for="c12">No </label>
                            </div>
                        </div>
                        <?php }elseif($lcd_cable == 0){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c11" name="lcd_cable" value="0" checked="checked">
                                <label for="c11" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c12" name="lcd_cable" value="1">
                                <label for="c12">No </label>
                            </div>
                        </div>
                        <?php }elseif($lcd_cable == 1){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c11" name="lcd_cable" value="0">
                                <label for="c11" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c12" name="lcd_cable" value="1" checked="checked">
                                <label for="c12">No </label>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label text-capitalize">Battery</label>
                        <?php if($battery == null){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c13" name="battery" value="0">
                                <label for="c13" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c14" name="battery" value="1">
                                <label for="c14">No </label>
                            </div>
                        </div>
                        <?php }elseif($battery == 0){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c13" name="battery" value="0" checked="checked">
                                <label for="c13" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c14" name="battery" value="1">
                                <label for="c14">No </label>
                            </div>
                        </div>
                        <?php }elseif($battery == 1){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c13" name="battery" value="0">
                                <label for="c13" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c14" name="battery" value="1" checked="checked">
                                <label for="c14">No </label>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label text-capitalize">Battery Cable</label>
                        <?php if($battery_cable == null){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c15" name="battery_cable" value="0">
                                <label for="c15" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c16" name="battery_cable" value="1">
                                <label for="c16">No </label>
                            </div>
                        </div>
                        <?php }elseif($battery_cable == 0){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c15" name="battery_cable" value="0" checked="checked">
                                <label for="c15" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c16" name="battery_cable" value="1">
                                <label for="c16">No </label>
                            </div>
                        </div>
                        <?php }elseif($battery_cable == 1){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c15" name="battery_cable" value="0">
                                <label for="c15" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c16" name="battery_cable" value="1" checked="checked">
                                <label for="c16">No </label>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label text-capitalize">DVD ROM</label>
                        <?php if($dvd_rom == null){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c17" name="dvd_rom" value="0">
                                <label for="c17" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c18" name="dvd_rom" value="1">
                                <label for="c18">No </label>
                            </div>
                        </div>
                        <?php }elseif($dvd_rom == 0){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c17" name="dvd_rom" value="0" checked="checked">
                                <label for="c17" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c18" name="dvd_rom" value="1">
                                <label for="c18">No </label>
                            </div>
                        </div>
                        <?php }elseif($dvd_rom == 1){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c17" name="dvd_rom" value="0">
                                <label for="c17" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c18" name="dvd_rom" value="1" checked="checked">
                                <label for="c18">No </label>
                            </div>
                        </div>
                        <?php } ?>

                    </div>

                    <div class="row">
                        <label class="col-sm-4 col-form-label text-capitalize">DVD Caddy</label>
                        <?php if($dvd_caddy == null){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c19" name="dvd_caddy" value="0">
                                <label for="c19" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c20" name="dvd_caddy" value="1">
                                <label for="c20">No </label>
                            </div>
                        </div>
                        <?php }elseif($dvd_caddy == 0){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c19" name="dvd_caddy" value="0" checked="checked">
                                <label for="c19" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c20" name="dvd_caddy" value="1">
                                <label for="c20">No </label>
                            </div>
                        </div>
                        <?php }elseif($dvd_caddy == 1){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c19" name="dvd_caddy" value="0">
                                <label for="c19" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c20" name="dvd_caddy" value="1" checked="checked">
                                <label for="c20">No </label>
                            </div>
                        </div>
                        <?php } ?>

                    </div>

                    <div class="row">
                        <label class="col-sm-4 col-form-label text-capitalize">HDD Caddy</label>
                        <?php if($hdd_caddy == null){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c21" name="hdd_caddy" value="0">
                                <label for="c21" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c22" name="hdd_caddy" value="1">
                                <label for="c22">No </label>
                            </div>
                        </div>
                        <?php }elseif($hdd_caddy == 0){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c21" name="hdd_caddy" value="0" checked="checked">
                                <label for="c21" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c22" name="hdd_caddy" value="1">
                                <label for="c22">No </label>
                            </div>
                        </div>
                        <?php }elseif($hdd_caddy == 1){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c21" name="hdd_caddy" value="0">
                                <label for="c21" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c22" name="hdd_caddy" value="1" checked="checked">
                                <label for="c22">No </label>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label text-capitalize">HDD Cable Connector</label>
                        <?php if($hdd_cable_connector == null){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c23" name="hdd_cable_connector" value="0">
                                <label for="c23" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c24" name="hdd_cable_connector" value="1">
                                <label for="c24">No </label>
                            </div>
                        </div>
                        <?php }elseif($hdd_cable_connector == 0){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c23" name="hdd_cable_connector" value="0" checked="checked">
                                <label for="c23" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c24" name="hdd_cable_connector" value="1">
                                <label for="c24">No </label>
                            </div>
                        </div>
                        <?php }elseif($hdd_cable_connector == 1){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c23" name="hdd_cable_connector" value="0">
                                <label for="c23" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c24" name="hdd_cable_connector" value="1" checked="checked">
                                <label for="c24">No </label>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label text-capitalize">C Panel / Palm Rest</label>
                        <?php if($c_panel_palm_rest == null){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c25" name="c_panel_palm_rest" value="0">
                                <label for="c25" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c26" name="c_panel_palm_rest" value="1">
                                <label for="c26">No </label>
                            </div>
                        </div>
                        <?php }elseif($c_panel_palm_rest == 0){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c25" name="c_panel_palm_rest" value="0" checked="checked">
                                <label for="c25" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c26" name="c_panel_palm_rest" value="1">
                                <label for="c26">No </label>
                            </div>
                        </div>
                        <?php }elseif($c_panel_palm_rest == 1){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c25" name="c_panel_palm_rest" value="0">
                                <label for="c25" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c26" name="c_panel_palm_rest" value="1" checked="checked">
                                <label for="c26">No </label>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label text-capitalize">D / MB Base</label>
                        <?php if($mb_base == null){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c33" name="mb_base" value="0">
                                <label for="c33" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c34" name="mb_base" value="1">
                                <label for="c34">No </label>
                            </div>
                        </div>
                        <?php }elseif($mb_base == 0){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c33" name="mb_base" value="0" checked="checked">
                                <label for="c33" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c34" name="mb_base" value="1">
                                <label for="c34">No </label>
                            </div>
                        </div>
                        <?php }elseif($mb_base == 1){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c33" name="mb_base" value="0">
                                <label for="c33" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c34" name="mb_base" value="1" checked="checked">
                                <label for="c34">No </label>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                            <div class="row">
                        <label class="col-sm-4 col-form-label text-capitalize">Hings Cover</label>
                        <?php if($hings_cover == null){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c27" name="hings_cover" value="0">
                                <label for="c27" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c28" name="hings_cover" value="1">
                                <label for="c28">No </label>
                            </div>
                        </div>
                        <?php }elseif($hings_cover == 0){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c27" name="hings_cover" value="0" checked="checked">
                                <label for="c27" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c28" name="hings_cover" value="1">
                                <label for="c28">No </label>
                            </div>
                        </div>
                        <?php }elseif($hings_cover == 1){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c27" name="hings_cover" value="0">
                                <label for="c27" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c28" name="hings_cover" value="1" checked="checked">
                                <label for="c28">No </label>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label text-capitalize">LAN Cover</label>
                        <?php if($lan_cover == null){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c29" name="lan_cover" value="0">
                                <label for="c29" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c30" name="lan_cover" value="1">
                                <label for="c30">No </label>
                            </div>
                        </div>
                        <?php }elseif($lan_cover == 0){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c29" name="lan_cover" value="0" checked="checked">
                                <label for="c29" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c30" name="lan_cover" value="1">
                                <label for="c30">No </label>
                            </div>
                        </div>
                        <?php }elseif($lan_cover == 1){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="c29" name="lan_cover" value="0">
                                <label for="c29" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="c30" name="lan_cover" value="1" checked="checked">
                                <label for="c30">No </label>
                            </div>
                        </div>
                        <?php } ?>

                    </div>





                    
<?php 

if(isset($_POST['combine_form'])){
    
    $sales_order_id = mysqli_real_escape_string($connection, $_GET['sales_order_id']);
    $emp_id = mysqli_real_escape_string($connection, $_GET['emp_id']);
    $inventory_id = mysqli_real_escape_string($connection, $_GET['inventory_id']);
    $keyboard = mysqli_real_escape_string($connection, $_POST['keyboard']);
    $speakers = mysqli_real_escape_string($connection, $_POST['speakers']);
    $camera = mysqli_real_escape_string($connection, $_POST['camera']);
    $bazel = mysqli_real_escape_string($connection, $_POST['bazel']);
    $keys= $_POST['keys'];
    $mousepad= $_POST['mousepad'];
    $mouse_pad_button= $_POST['mouse_pad_button'];
    $camera_cable= $_POST['camera_cable'];
    $back_cover= $_POST['back_cover'];
    $wifi_card= $_POST['wifi_card'];
    $lcd_cable= $_POST['lcd_cable'];
    $battery= $_POST['battery'];
    $battery_cable= $_POST['battery_cable'];
    $dvd_rom= $_POST['dvd_rom'];
    $dvd_caddy= $_POST['dvd_caddy'];
    $hdd_caddy= $_POST['hdd_caddy'];
    $hdd_cable_connector= $_POST['hdd_cable_connector'];
    $c_panel_palm_rest= $_POST['c_panel_palm_rest'];
    $mb_base= $_POST['mb_base'];
    $hings_cover= $_POST['hings_cover'];
    $lan_cover= $_POST['lan_cover'];


    $status = 0;
     if($keyboard == 1 || $Keys == 1 || $speakers == 1 || $camera ==1 || $bazel ==1 || $mousepad == 1 || $mouse_pad_button == 1 || $camera_cable == 1 || $back_cover ==1 || $wifi_card ==1 ||
     $lcd_cable == 1 || $battery == 1 || $battery_cable == 1 || $dvd_rom ==1 || $dvd_caddy ==1 || $hdd_caddy == 1 || $hdd_cable_connector == 1 || $c_panel_palm_rest == 1 || $mb_base ==1 || $hings_cover ==1 || $lan_cover ==1){
        $status = 1;
     }
    if($lunch_combine == 1){
    $query = "INSERT INTO combine_check (sales_order_id, emp_id, inventory_id, keyboard, speakers, camera, bazel,status,keys,mousepad,mouse_pad_button,camera_cable,back_cover
    ,wifi_card,lcd_cable,battery,battery_cable,dvd_rom,dvd_caddy,hdd_caddy,hdd_cable_cable_connector,c_panel_palm_rest,mb_base,hings_cover,lan_cover) 
                VALUES ('$sales_order_id', '$emp_id', '$inventory_id', '$keyboard', '$speakers', '$camera', '$bazel','$status','$keys','$mousepad','$mouse_pad_button','$camera_cable','$back_cover','$wifi_card'
                ,'$lcd_cable','$battery','$battery_cable','$dvd_rom','$dvd_caddy','$hdd_caddy','$hdd_cable_connector','$c_panel_palm_rest','$mb_base','$hings_cover','$lan_cover')";
echo $query;
    // $query_run = mysqli_query($connection, $query);
    if($status == 1){
     $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                                $date = $date1->format('Y-m-d H:i:s');
    $query_prod_info ="UPDATE prod_info SET end_date_time=' $date',status='0',issue_type='2' WHERE p_id ='$p_id' ";
    $query_prod_run = mysqli_query($connection, $query_prod_info);
    header("location: ./production_member_daily_task.php?sales_order_id={$sales_order_id}&tech_id={$tech_id}");
    }else{
            header("location: ./production_checklist.php?emp_id={$emp_id}&inventory_id={$inventory_id}&sales_order_id={$sales_order_id}");
        }
    }else{
        echo "already checked";
    }
}

?>