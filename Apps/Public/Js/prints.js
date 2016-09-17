$(document).ready(function(){
   $("#selectAll").click(function(){
        var isChecked = $(this).prop("checked");
        $("input#tt").prop("checked", isChecked);
    });
});
function Prints(){
    $.ajaxSetup({async : false});
    var LODOP=getLodop();
    var checkList=$("input[type=checkbox]");
    for(var i=0;i<checkList.length;i++)
    if(checkList[i].name!="chk_all"&&checkList[i].checked==true){
        $.get("/Admin/Print/tt/id/"+checkList[i].name+"/from/ajax",function(data){
        LODOP.PRINT_INIT("订单"+checkList[i].name);
        LODOP.SET_PRINT_PAGESIZE(0,1000,1000,"A4");
        LODOP.ADD_PRINT_HTM("1mm","1mm","100%","100%",data);
        LODOP.SET_PRINT_MODE("POS_BASEON_PAPER",true);
        //设置仅打印一页
        LODOP.SET_PRINT_MODE("PRINT_END_PAGE",1);
        LODOP.PRINT();//打印
        });
    }
}