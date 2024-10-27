<!-- Custom fonts and icons for this template-->
<link href="{{ asset('/') }}dash/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<!-- Custom styles for this template-->
<link href="{{ asset('/') }}dash/css/sb-admin-2.min.css" rel="stylesheet">

<style>
.img-table {
    max-width: 100%;
    height: 100px;
    display: block;
}

.img-product {
    max-width: 100%;
    height: 250px;
    display: block;
}

.required-asterisk {
    color: #e74c3c;
    /* Vibrant red color */
    font-size: 1.2em;
    /* Larger size for visibility */
    font-weight: bold;
    /* Bold to stand out */
    margin-left: 5px;
    /* Space between label and asterisk */
    animation: blink 1.5s infinite ease-in-out;
}

/* Keyframes for the blinking effect */
@keyframes blink {

    0%,
    100% {
        opacity: 1;
        transform: scale(1);
    }

    50% {
        opacity: 0.5;
        transform: scale(1.1);
    }
</style>

@stack('css')