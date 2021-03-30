function formatDate(data){

    if(data != null){
        var temp = data.split("-");
        var getYear = parseInt(temp[0]) + 543;
        var getMonth = temp[1];
        var getDay = temp[2];
        return getDay+"/"+getMonth+"/"+getYear;
    }else{
        return "";
    }
}



function fullDate(data){
    if(data !="" && data !=null){
        var temp = data.split("-");
        return temp[2]+" "+monthDate(temp[1])+" "+thaiYear(temp[0]);
    }else{
        return "";
    }
}



function monthDate(data){
    switch(data){
        case "01":
            return "มกราคม";
            break;
        case "02":
            return "กุมภาพันธ์";
            break;
        case "03":
            return "มีนาคม";
            break;
        case "04":
            return "เมษายน";
            break;
        case "05":
            return "พฤษภาคม";
            break;
        case "06":
            return "มิถุนายน";
            break;
        case "07":
            return "กรกฎาคม";
            break;
        case "08":
            return "สิงหาคม";
            break;
        case "09":
            return "กันยายน";
            break;
        case "10":
            return "ตุลาคม";
            break;
        case "11":
            return "พฤศจิกายน";
            break;
        case "12":
            return "ธันวาคม";
            break;
        default:
            return "";
    }
}




function thaiYear(data){
    return parseInt(data)+ 543;
}