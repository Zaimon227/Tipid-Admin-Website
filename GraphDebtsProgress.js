$ (document) .ready(function() {
    $.ajax( {
        url:"http://localhost/Tipid_admin/graphDebtsProgress.php",
        type: "GET",
        success: function(data) {
            console.log(data);

            var info = [];

            for(var i in data) {
                info.push(data[i].info);
            }

            var chartdata = {
                labels: ["Total Paid", "Total Debts"],
                datasets: [
                    {
                        label: ["Total Paid", "Total Debts"],
                        data: info,
                        backgroundColor: ["#6699FF", "#003B6D"]
                    }
                ]
            };

            var ctx = $("#GraphDebtsProgress");
            var LineGraph = new Chart(ctx, {
                type: 'pie',
                data: chartdata
            });
        },
        error: function(data) {

        }
    });
});