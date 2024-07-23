function validation() {

    if (document.getElementById("name")) {

        let x = document.getElementById("name").value;


        if (x === "") {
           /* text = '<div class="notify bottom-left do-show" data-notification-status="error">الرجاء ملئ حقل الاسم كاملا باللغة العربية</div>';
            document.getElementById("MSG").innerHTML = text;*/
            swal("sorry", "Please Write Your Name!", "error");
            return false;

        }

    }


    if (document.getElementById("email")) {

        let x = document.getElementById("email").value;


        if (x === "") {
            /* text = '<div class="notify bottom-left do-show" data-notification-status="error">الرجاء ملئ حقل الاسم كاملا باللغة العربية</div>';
             document.getElementById("MSG").innerHTML = text;*/
            swal("sorry", "Please Write Your Email!", "error");
            return false;

        }

    }


    if (document.getElementById("age")) {

        let x = document.getElementById("age").value;


        if (x === "") {
            /* text = '<div class="notify bottom-left do-show" data-notification-status="error">الرجاء ملئ حقل الاسم كاملا باللغة العربية</div>';
             document.getElementById("MSG").innerHTML = text;*/
            swal("sorry", "Please Write Your age!", "error");
            return false;

        }

    }

    if (document.getElementById("instagram")) {

        let x = document.getElementById("instagram").value;


        if (x === "") {
            /* text = '<div class="notify bottom-left do-show" data-notification-status="error">الرجاء ملئ حقل الاسم كاملا باللغة العربية</div>';
             document.getElementById("MSG").innerHTML = text;*/
            swal("sorry", "Please Write Your instagram Page Link !", "error");
            return false;

        }

    }

    if (document.getElementById("invited_by")) {

        let x = document.getElementById("invited_by").value;


        if (x === "") {
            /* text = '<div class="notify bottom-left do-show" data-notification-status="error">الرجاء ملئ حقل الاسم كاملا باللغة العربية</div>';
             document.getElementById("MSG").innerHTML = text;*/
            swal("sorry", "Please Write name of the person who invited you !", "error");
            return false;

        }

    }

    if (document.getElementById("ticket_type")) {

        let x = document.getElementById("ticket_type").value;


        if (x === "") {
            /* text = '<div class="notify bottom-left do-show" data-notification-status="error">الرجاء ملئ حقل الاسم كاملا باللغة العربية</div>';
             document.getElementById("MSG").innerHTML = text;*/
            swal("sorry", "Please Write select your ticket !", "error");
            return false;

        }

    }

    if (document.getElementById("phone")) {

        let x = document.getElementById("phone").value;

        if (x === "") {
            /* text = '<div class="notify bottom-left do-show" data-notification-status="error">الرجاء ملئ حقل الاسم كاملا باللغة العربية</div>';
             document.getElementById("MSG").innerHTML = text;*/
            swal("sorry", "Please Write your phone number!", "error");
            return false;

        }else if(x.length !== 10){
            swal("sorry", "The mobile number must be 10 digits", "error");
            return false;
        }

    }

    if (document.getElementById("whatsapp")) {

        let x = document.getElementById("whatsapp").value;


        if (x === "") {
            /* text = '<div class="notify bottom-left do-show" data-notification-status="error">الرجاء ملئ حقل الاسم كاملا باللغة العربية</div>';
             document.getElementById("MSG").innerHTML = text;*/
            swal("sorry", "Please Write your phone whatsapp number !", "error");
            return false;

        }else if(x.length !== 10){
            swal("sorry", "The whatsapp number must be 10 digits", "error");
            return false;
        }

    }










        if (document.getElementById("NameEN")) {

            /*var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
                '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
                '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
                '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
                '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
                '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
            return !!pattern.test(str);*/
        var number = document.getElementById("NameEN").value;


        if (number == "") {

            text = '<div class="notify bottom-left do-show" data-notification-status="error">الرجاء ملئ حقل الاسم كاملا باللغة الانجليزية</div>';
            document.getElementById("MSG").innerHTML = text;

            return false;

        }

    }










/*******************************سجل الخصوز*******************************************/



    if (document.getElementById("OppoName")) {

        var number = document.getElementById("OppoName").value;


        if (number == "") {

            text =swal("خطأ", "الرجاء كتابة اسم الخصم!", "error");
            //document.getElementById("MSG").innerHTML = text;

            return false;

        }

    }



/*******************************سجل الخصوز*******************************************/


/**********************************************************************************/

    return true;

}





