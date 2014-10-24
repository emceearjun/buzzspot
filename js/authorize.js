function set_session_for_above(obj)
{
    obj.session_name = "above_21";
}

function set_session_for_below(obj)
{
    obj.session_name = "below_21";
    window.location = "unauthorized.php";
}