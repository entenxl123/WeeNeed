$(function(){
    $("#signOut").on('click',function(){
        $.ajax({
            url:'logout.php?status=logOut',
            success:function(rep){
                //console.log(rep);
                if(rep==1){
                    location.href='index.html'
                }
            }
        })
    })

    $("#countPR").hide();
    $("#countPO").hide();
    $("#countCM").hide();
    $("#countMT").hide();
	$("#countAT").hide();

    //GET COUNT PR
    $.get('api/controller/pr.php?status=ReadCount',function(rep){
        //console.log(rep);
        $('#loading-pr').hide();
        $("#countPR").show();
        $("#countPR").text(rep);
    })

    //GET COUNT PR
    $.get('api/controller/po.php?status=ReadCount',function(rep){
        //console.log(rep);
        $('#loading-po').hide();
        $("#countPO").show();
        $("#countPO").text(rep);
    })

	//GET COUNT ISD
    $.get('api/controller/isd.php?status=ReadCount',function(rep){
        $('#loading-isd').hide();
        $("#countISD").show();
        $('#countISD').text(rep);
    })
	
	//GET COUNT CM
    $.get('api/controller/cm.php?status=ReadCount',function(rep){

        $('#loading-cm').hide();
        $("#countCM").show();
        $('#countCM').text(rep);
    })
	
	//GET COUNT MT
    $.get('api/controller/mt.php?status=ReadCount',function(rep){
		//alert(rep);
        $('#loading-mt').hide();
        $("#countMT").show();
        $('#countMT').text(rep);
    })
	
	//GET COUNT AT
	$.get('api/controller/AT.php?status=ReadCount',function(rep){
		//console.log(rep);
		$('#loading-AT').hide();
		$("#countAT").show();
		$('#countAT').text(rep);
    })
    
    //GET COUNT QMS
    $.get('api/controller/QMS.php?status=ReadCount',function(rep){
		console.log(rep);
		$('#loading-QMS').hide();
		$("#countQMS").show();
		$('#countQMS').text(rep);
    })
	
	
})