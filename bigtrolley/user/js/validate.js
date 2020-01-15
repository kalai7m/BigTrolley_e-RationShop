function vt(id)
{
    if($("#"+id).val()==null || $("#"+id).val()=="")
    {
        alert("Error!!!!!!");
        return false;
    }
}
function validate()
{
    vt("rno");
    return false;
}