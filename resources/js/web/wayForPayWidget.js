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

    // wayforpay.run({
    //         merchantSecretKey: '0f754fad1b3922bd142a050068e0e2470d35ba70',
    //         merchantAccount : "code_co_test",
    //         merchantDomainName : "{{ URL::to('/') }}",
    //         merchantSignature : '{{ hash_hmac('md5', 'test_merch_n1;www.market.ua;DH1611316822;1415379863;1547.36;UAH;Процессор Intel Core i5-4670 3.4GHz;Память Kingston DDR3-1600 4096MB PC3-12800;1;1;1000;547.36', 'flk3409refn54t54t*FNJRET') }}',
    //         orderReference : 'DH1611316822',
    //         orderDate : 1415379863,
    //         orderTimeout : 49000,
    //         amount : '1547.36',
    //         currency : 'UAH',
    //         language: 'auto',
    //         productName : ['Процессор Intel Core i5-4670 3.4GHz', 'Память Kingston DDR3-1600 4096MB PC3-12800'],
    //         productPrice : ['1000', '547.36'],
    //         productCount : ['1', '1'],
    //     },
    //     function (response) {
    //         // on approved
    //         console.log(response)
    //     },
    //     function (response) {
    //         // on declined
    //         console.log(response)
    //     },
    //     function (response) {
    //         // on pending or in processing
    //         console.log(response)
    //     });
});
