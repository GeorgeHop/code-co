const ValidKeys = [
    'merchantSecretKey',
    'merchantAccount',
    'merchantDomainName',
    'merchantSignature',
    'orderReference',
    'orderDate',
    'orderTimeout',
    'amount',
    'currency',
    'language',
    'productName',
    'productPrice',
    'productCount',
];

$('button[data-wfp]').click(function () {
    axios.post('/generate-payment', {'offerId': $(this).data('wfp')})
        .then(res => {
            const data = [];

            ValidKeys.forEach(key => {
                data[key] = res.data[key];
            });

            wayforpay.run(
                data,
                function (response) {
                    // on approved
                    axios.post('/approve-payment', {
                        'merchantSignature': response.merchantSignature,
                        'orderReference': response.orderReference,
                    });
                },
                function (response) {
                    // on declined
                },
                function (response) {
                    // on pending or in processing
                });
        });
});
