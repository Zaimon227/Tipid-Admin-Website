$ (document) .ready(function() {
    $.ajax( {
        url:"http://localhost/Tipid_admin/graphTopDues.php",
        type: "GET",
        success: function(data) {
            console.log(data);

            var name = [];
            var count = [];

            for(var i in data) {
                name.push(data[i].name);
                count.push(data[i].count);
            }

            var chartdata = {
                labels: name,
                datasets: [
                    {
                        label: "Dues",
                        fill: false,
                        lineTension: 0.1,
                        backgroundColor: "#6699FF",
                        borderColor: "99BBFF",
                        pointHoverBackgroundColor: "#6699FF",
                        pointHoverBorderColor: "#6699FF",
                        data: count
                    }
                ]
            };

            var ctx = $("#GraphTopDues");
            var LineGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata
            });
        },
        error: function(data) {

        }
    });
});