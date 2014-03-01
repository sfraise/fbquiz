$(document).ready(function () {
    // LOAD FACEBOOK JS SDK
    $.ajaxSetup({ cache: true });
    $.getScript('//connect.facebook.net/en_UK/all.js', function(){
        FB.init({
            appId: '418869738192451'
        });
    });

    // SUBMIT THE QUIZ FORM
    $('#quiz_submit').click(function () {
        var name = '';
        var email = '';
        var userid = '';
        var answer = $('#question').val();

        // GET THE FACEBOOK LOGIN STATUS
        FB.getLoginStatus(function(response){
            // IF ALREADY CONNECTED GET FACEBOOK USER INFO AND SUBMIT
            if (response.status === 'connected') {
                FB.api('/me', function(userInfo) {
                    var name = userInfo.name;
                    var email = userInfo.email;
                    var userid = userInfo.id;

                    if(answer == '') {
                        $('#ajaxError').html('Please select an answer!');
                    } else {
                        $('#ajaxError').html('');
                        $('#ajaxDiv').html('<img id="ajaxloading" src="/images/loading/loading35.gif" alt="Loading" title="Loading" />');
                        $.ajax({
                            url: 'helpers/submit.php',
                            type: 'POST',
                            data: {answer: answer, name: name, email: email, userid: userid},
                            success: function (data) {
                                $('#ajaxDiv').html(data);
                            },
                            error: function () {
                                $('#ajaxError').html('There was an error submitting the form');
                            }
                        });
                        return false;
                    }
                });
            } else {
                // IF NOT LOGGED IN SHOW FACEBOOK LOGIN POPUP
                FB.login(function(response) {
                    // ON LOGIN GET FACEBOOK USER INFO AND SUBMIT
                    if (response.authResponse) {
                        FB.api('/me', function(response) {
                            var name = response.name;
                            var email = response.email;
                            var userid = response.id;

                            $('#ajaxError').html('');
                            $('#ajaxDiv').html('<img id="ajaxloading" src="/images/loading/loading35.gif" alt="Loading" title="Loading" />');
                            $.ajax({
                                url: 'helpers/submit.php',
                                type: 'POST',
                                data: {answer: answer, name: name, email: email, userid: userid},
                                success: function (data) {
                                    $('#ajaxDiv').html(data);
                                },
                                error: function () {
                                    $('#ajaxError').html('There was an error submitting the form');
                                }
                            });
                            return false;
                        });
                    } else {
                        // console.log('User cancelled login or did not fully authorize.');
                    }
                }, { scope: 'email' });
            }
        });
    });
});