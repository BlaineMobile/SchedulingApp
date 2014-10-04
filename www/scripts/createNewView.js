function toggleSettings(){
    console.log("test");
    var displayVal =  $('#advancedSettings').css('display');
    if(displayVal == 'none'){
        $('#toggle-settings').css('display', 'initial');
        $('#toggle-settings').html('Hide Advanced Settings');
    }else{
        $('#toggle-settings').css('display', 'none');
        $('#toggle-settings').html('Show Advanced Settings');
    }
}

$('document').ready(function(){
    $('#toggle-settings').click(toggleSettings());
});