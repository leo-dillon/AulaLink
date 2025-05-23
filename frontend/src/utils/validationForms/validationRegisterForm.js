import { validateAddress, validateBirthdate, validateDNI, validateEmail, validateFirstName, validateGenre, validateLastName, validatePassword, validatephone } from "../validations.js"

export function validateRegisterForm( data ){
    let errors = {}
    let {firstName, lastName, gender, birthdate, dni, email, address, phone, password} = data

    const resultValidationFistName = validateFirstName(firstName)
    if( resultValidationFistName.length > 3 ) errors.firstName = resultValidationFistName 

    const resultValidationLastName = validateLastName(lastName)
    if( resultValidationLastName.length > 3 ) errors.lastName = resultValidationLastName
    
    const resultValidationGenre = validateGenre(gender)
    if( resultValidationGenre.length > 3 ) errors.gender = resultValidationFistName

    const resultValidationBirthDate = validateBirthdate(birthdate) 
    if( resultValidationBirthDate.length > 3 ) errors.birthdate = resultValidationBirthDate

    const resultValidationDNI = validateDNI(dni)
    if( resultValidationDNI.length > 3 ) errors.dni = resultValidationDNI

    const resultValidationGmail = validateEmail(email)
    if( resultValidationGmail.length > 3 ) errors.email = resultValidationGmail

    const resultValidationAddress = validateAddress(address)
    if( resultValidationAddress.length > 3 ) errors.address = resultValidationAddress

    const resultValidationphone = validatephone(phone)
    if( resultValidationphone.length > 3 ) errors.phone = resultValidationphone

    const resultValidationPassword = validatePassword(password)
    if( resultValidationPassword.length > 3 ) errors.password = resultValidationPassword

    return errors
}