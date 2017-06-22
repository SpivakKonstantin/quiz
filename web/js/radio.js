$( document ).ready(function() {
    /**
     * if form has on the page
     */
    if($('#questionForm').length > 0){
        /**
         *
         * @type {boolean}
         */
        var disabledSocket = false;

        /**
         * emulation login user
         * @type {number}
         */

        var serverUrl = 'http://127.0.0.1:3000';
        var socket = io(serverUrl);

        socket.on('fromnode', function(data){
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

        function SetRadioButtonChkProperty(labelElement, name){
            var nameEl = $(labelElement).find(':radio').attr('name');

            if(disabledSocket === false){
                //userId only for example
                console.log($('#questionForm').serializeArray())
                socket.emit('tonode', {userId:'2',radio:nameEl});
            }
            disabledSocket = false;


            if($(labelElement).hasClass('active') === true){
                $( ":radio[name='"+nameEl+"']" ).prop('checked', false);
                $( labelElement ).change(function() {
                    $(labelElement).removeClass('active')
                });
            }


        }

        $( "#questionForm" ).submit(function( event ) {
            if($('.questionBlock').length !== $('#questionForm label.btn-default.active').length){
                    $( ".error-answer" ).fadeIn( "slow", function() {
                });
                event.preventDefault();
            }else {

                /**
                 * all elements uncheck who don't have class active
                 */
                $('#questionForm label.btn-default:not(.active)').each(function (index, el) {
                    $(el).find(":radio").prop('checked', false)
                });


                /**
                 * check radio if label has class active
                 */
                $('#questionForm label.btn-default.active').each(function (index, el) {
                    $(el).find(":radio").prop('checked', true)
                });
            }
        });
    }


})