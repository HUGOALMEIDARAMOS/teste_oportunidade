//LISTA TODOS OS USUARIOS DA API

$.ajax({
    url: "https://reqres.in/api/users?per_page=20",
    data: {},
    beforeSend: function(){}
}).done(function(response) {
    var trArr = new Array();
    $.each(response.data, function(i, v){
        trArr.push('<tr><td>' + v.id + '</td><td>' + v.first_name + '</td><td>' + v.last_name + '</td><td><img src="' + v.avatar + '" class="rounded-circle ml-5" /></td><td class="text-center"><button type="button" class="btn btn-warning pt-3">Detalhes</button></td></tr>');
    });
    $('table#alk-table tbody').append(trArr.join('\n'));
});
