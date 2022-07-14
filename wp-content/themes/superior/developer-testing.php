<?php /* Template Name: Developer Testing */
get_header(); ?>
</br>
</br>
</br>
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>

<script>

  hbspt.forms.create({

    region: "na1",

    portalId: "9473168",

    formId: "451a446b-a02f-46e1-a699-9d869f5ecf2c"

  });

</script>

<script>
	window.onload = function () {
		let myiFrame = document.getElementById( 'hs-form-iframe-0' );
		let doc = myiFrame.contentDocument;
		doc.body.innerHTML = doc.body.innerHTML + '<style>@import url("https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap");#hsForm_451a446b-a02f-46e1-a699-9d869f5ecf2c label{font-size:16px!important;line-height:24px;color:#3e3e3e!important; font-family: "Open Sans", sans-serif;}#hsForm_451a446b-a02f-46e1-a699-9d869f5ecf2c .hs-input{background:#fff;border-color:#5b6770;font-family: "Open Sans", sans-serif;color:#3e3e3e}#hsForm_451a446b-a02f-46e1-a699-9d869f5ecf2c p a{color:#489fdf!important; font-family: "Open Sans", sans-serif;}#hsForm_451a446b-a02f-46e1-a699-9d869f5ecf2c p span{color:#000!important;font-size:16px; font-family: "Open Sans", sans-serif;}#hsForm_451a446b-a02f-46e1-a699-9d869f5ecf2c .hs-button{background:#f2542d;border-color:#f2542d;border-radius:50px;font-size:20px;line-height:22px;padding:12px 50px;font-weight:400; font-family: "Open Sans", sans-serif; text-transform: uppercase;}#hsForm_451a446b-a02f-46e1-a699-9d869f5ecf2c .hs-button:focus,#hsForm_451a446b-a02f-46e1-a699-9d869f5ecf2c .hs-button:hover{background:#489fdf;border-color:#489fdf}@media(max-width: 576px){#hsForm_451a446b-a02f-46e1-a699-9d869f5ecf2c p span{color:#000!important;font-size:14px}}input.hs-button.primary.large {background: #ed9c21;font-size:18px !important;text-transform:uppercase;font-family: Montserrat, sans-serif !important;min-width:180px !important;font-weight: 600;padding: 18px 10px;transition:all 0.3s ease-in-out;}input.hs-button.primary.large:hover{background:#000 !important;border-color:#000 !important;}.hs_submit.hs-submit .actions{margin:0!important;padding:0;text-align:center}</style>';
	};
</script>

<?php
get_footer(); ?>