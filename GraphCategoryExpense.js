$ (document) .ready(function() {
    $.ajax( {
        url:"http://localhost/Tipid_admin/graphCategoryExpenses.php",
        type: "GET",
        success: function(data) {
            console.log(data);

            var category = [];
            var count = [];

            for(var i in data) {
                category.push(data[i].category);
                count.push(data[i].count);
            }

            var chartdata = {
                labels: category,
                datasets: [
                    {
                        label: "Count",
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

            var ctx = $("#GraphCategory");
            var LineGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata
            });
        },
        error: function(data) {

        }
    });
});