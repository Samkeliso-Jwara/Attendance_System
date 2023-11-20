window.onload = function () {
    var canvas = document.getElementById('signature-pad');
    var signaturePad = new SignaturePad(canvas, {
        backgroundColor: 'white',
        penColor: 'blue'
    });

    function clearSignature() {
        signaturePad.clear();
    }

    document.getElementById('clearButton').addEventListener('click', function () {
        clearSignature();
    });
};
