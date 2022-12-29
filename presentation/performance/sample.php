if($data['bios_lock_hp'] == 'ok' && $data['bios_lock_dell'] == 'ok' && $data['bios_lock_lenovo'] == 'ok' &&
$data['bios_lock_other'] == 'ok' && $data['computrace_hp'] == 'inactive' &&
$data['computrace_dell'] == 'deactivate' && $data['computrace_lenovo'] == 'ok' && $data['computrace_other'] == 'ok' &&
$data['me_region_lock_hp'] == 'ok' && $data['tpm_lock_dell'] == 'ok' &&
$data['other_error_lenovo'] == 'no_have' && $data['other_error_other_brand'] == 'no_have' && $data['a_top'] == 'ok' &&
$data['b_bazel'] == 'ok' && $data['c_palmrest'] == 'ok' && $data['d_back_cover'] == 'ok' &&
$data['keyboard'] == 'ok' && $data['webcam'] == 'ok'&& $data['lcd'] == 'ok' && $data['mousepad_button'] == 'ok' &&
$data['mic'] == 'ok' && $data['speaker'] == 'ok' && $data['wi_fi_connection'] == 'ok' &&
$data['usb'] == 'ok' && $data['battery'] == 'bad' && $data['hinges_cover'] == 'ok' ){
echo "Pass";
}