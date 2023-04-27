$ (document) .ready(function() {
    $.ajax( {
        url:"http://localhost/Tipid_admin/graphMonthlyEarnings.php",
        type: "GET",
        success: function(data) {
            console.log(data);

            var count = [];

            for(var i in data) {
                count.push(data[i].count);
            }

            var chartdata = {
                labels: ['< 15,000', '15,001 - 35,000', '35,001 - 55,000', '55,001 - 75,000', '75,001 - 95,000', '95,000 +'],
                datasets: [
                    {
                        label: "Count",
                        data: count,
                        backgroundColor: ['#07152B','#003B6D', '#6699CC', '#6699FF', '#BDBDBD', '#676767']
                    }
                ]
            };

            var ctx = $("#GraphMonthly");
            var LineGraph = new Chart(ctx, {
                type: 'pie',
                data: chartdata
            });
        },
        error: function(data) {

        }
    });
});