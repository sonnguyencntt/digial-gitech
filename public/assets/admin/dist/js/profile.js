
function validate()
{
    if (func.ValidateId(["ho_va_ten" ,"setting_password","setting_cpassword"], ["email"], ["sdt"]) === true) {
        return true
    }
    return false;
}
