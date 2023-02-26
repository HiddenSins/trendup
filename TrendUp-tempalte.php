<?php
/*
Template Name: TrendUp
Template Post Type: post, page, product
*/
/*
Code Author e-mail: grabarka1111@gmail.com
 */
get_header();
?>
    <form id="contact-form" role="form">
        <div class="form-group mt-5">
            <input type="file" class="form-control" id="file"  placeholder="сумма" required>
        </div>

        <div class="btn-container">
            <button type="button" id="send_button" class="btn btn-primary big-button" value="Send">Отправить</button>
        </div>
        <div class="messages mt-4"></div>
    </form>
    <script>
        jQuery(document).ready(function($){
            $('#send_button').on('click', function (event) {
                event.preventDefault();

                let $file = $("#file");
                let form_data = new FormData;
                    form_data.append('file', $("#file")[0].files[0]);

                    $.ajax({
                        url:  '/wp-content/plugins/trendup/trendup-handler.php',
                        data: form_data,
                        cache: false,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        success: function (data) {
                            console.log(data);
                        }
                    })
            });
        })
    </script>
<?php get_footer();