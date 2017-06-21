$( document ).ready(function() {
    /**
     *
     * @type {boolean}
     */
    disabledSocket = false;

    /**
     * emulation login user
     * @type {number}
     */
    userId = 2;
    var socket = io('http://localhost:3000');

    socket.on('fromnode', function(data){
        console.log(data)
        disabledSocket = true;
        $( ":radio[name='" + data.radio + "']" ).trigger( "click" );
    });

    InitRadio('q1');

    function InitRadio(name){
        $.each($(':radio'), function(){
            $(this).parent().on("click", function(event){
                SetRadioButtonChkProperty(this, 'run');
            });
        });
    }

    function SetRadioButtonChkProperty(val, name){
        var nameEl = $(val).find(':radio').attr('name');
        if(disabledSocket == false){
            socket.emit('tonode', {userId:2,radio:nameEl});
        }
        disabledSocket = false;
        $( ":radio[name='"+nameEl+"']" ).prop('checked', false);
        if($(val).hasClass('active') == true){
            $( ":radio[name='"+nameEl+"']" ).prop('checked', false);
            $( val ).change(function() {
                $(val).removeClass('active')
            });
        }
    }

    $( "#questionForm" ).submit(function( event ) {
        if($('.questionBlock').length != $('#questionForm label.btn-default.active').length){
                $( ".error-answer" ).fadeIn( "slow", function() {
            });
            event.preventDefault();
        }else {
            $('#questionForm label.btn-default:not(.active)').each(function (index, el) {
                $(el).find(":radio").prop('checked', false)
            })
        }
    });


})