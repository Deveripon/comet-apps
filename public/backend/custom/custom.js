
    (function ($) {
        //delete Confirmation
        $(document).ready(function () {
            $(".delete_form").submit(function (e) {
                let conf = confirm("Are You Sure ?");

                if (conf) {
                    return true;
                } else {
                    return e.preventDefault();
                }
            });
        });

        //make datatable
        $(document).ready(function () {
            $(".data_table").DataTable();
        });

        //profile photo change button
        $(document).ready(function () {
            $(".user-image").mouseenter(function () {
                $(".change_btn").show();
            });
        });
        $(document).ready(function () {
            $(".change_btn").hover(function () {
                $(".change_btn").show();
            });
        });
        $(document).ready(function () {
            $(".change_btn").mouseleave(function () {
                $(".change_btn").hide();
            });
        });

        //profile photo change prview
        $(document).ready(function () {
            $("#change_photo").change(function (e) {
                const $get_url = URL.createObjectURL(e.target.files[0]);
                $(".user-image").attr("src", $get_url);
                $(".submit_button").show();
            });
        });

        //website logo image preview
        $(document).ready(function () {
            $("#logo_upload").change(function (e) {
                const $url = URL.createObjectURL(e.target.files[0]);

                $(".logo_preview").attr("src", $url);
            });
        });
        //website favicon image preview
        $(document).ready(function () {
            $("#fav_upload").change(function (e) {
                const $fav_url = URL.createObjectURL(e.target.files[0]);

                $(".fav_preview").attr("src", $fav_url);
            });
        });

        //website logo remove feature
        $(document).ready(function () {
            $(".remove_logo").click(function () {
                $(".logo_preview").removeAttr("src");
            });
        });
        //website fabicon remove feature
        $(document).ready(function () {
            $(".remove_fav").click(function () {
                $(".fav_preview").removeAttr("src");
            });
        });

        //Add Slider Button System
        let btn_no = 1;
        $(document).ready(function () {
            $("#add_button").click(function (e) {
                e.preventDefault();

                $(".slider_button_area").append(`
            <div class="btn-opt-area">
            <label class="" for="btn">Button : ${btn_no}</label>
            <span class="close-btn d-inline bg-danger" style="color:#fff;padding:3px; cursor:pointer;border-radius:3px;float:right"> Remove </span> 
            <div class="form-group" style="outline:1px solid #ddd;padding:10px; border-radius:5px;">
                <input name="btn_name[]" id="btn" class="form-control" type="text" placeholder="Button Title">
                <input name="btn_link[]" id="btn" class="form-control" type="text" placeholder="Button Link">
                <br>
                <label for="btn-color">Select Button Style</label>
                <select name="btn_type[]" id="" class="form-control">
                    <option value="btn btn-light-out">default</option>
                    <option value="btn btn-color btn-full">red</option>
                </select>
            </div> </div>
        `);
                btn_no++;
            });
        });

        //slider button section remove feature
        $(document).on("click", ".close-btn", function (e) {
            $(this).closest(".btn-opt-area").remove();
            e.preventDefault();
        });

        //slider image preview
        $(document).ready(function () {
            $(".slider_image").change(function (e) {
                let image_url = URL.createObjectURL(e.target.files[0]);
                $(".slider_image_preview").attr("src", image_url);
            });
        });
        //icon box hover active class
        $(document).ready(function () {
            $(".icon-box").click(function () {
                $(".icon-box").removeClass("active-icon");
                $(this).addClass("active-icon");
            });
        });
        //icon box get icon value
        $(document).ready(function () {
            $(".icon-box .preview-icon i").click(function () {
                $icon_code = $(this).attr("class");
                $("input.expertise-icon").val($icon_code);
            });
        });
        //portfolio featured image preview
        $(".featured_image").change(function (e) {
            let $image = URL.createObjectURL(e.target.files[0]);
            $(".featured_image_preview").attr("src", $image);
        });

        //portfolio gallery image preview
        $("#gallery_img").change(function (e) {
            let $images = e.target.files;
            let $gallery_image_url = "";
            for (let $i = 0; $i < $images.length; $i++) {
                let $gallery_img = URL.createObjectURL(e.target.files[$i]);
                $gallery_image_url += `<div class="gallery_item"><i class="fa-solid fa-circle-xmark"></i>  <img src="${$gallery_img}"></div>`;
            }
            $(".gallery_img_preview_section").append($gallery_image_url);
        });
    })(jQuery);
