
export function validateFirstName(firstName){
    let message = ""
    if(!firstName) message += "Debes completar este campo."
    if(firstName.trim().length < 3) message += "El nombre debe tener más de 3 caracteres."
    return message
}

export function validateLastName(lastName){
    let message = ""
    if(!lastName) message += "Debes completar este campo"
    if(lastName.length < 3) message += "El apellido debe tener más de 3 caracteres."
    return message
}

export function validateGenre(genre){
    let message = ""
    if(!genre) message += "Debes completar este campo"
    return message
}

export function validateBirthdate(birthdate){
    let message = ""
    const date = new Date(birthdate)
    const today = new Date()
    const ageDif = today.getFullYear() - date.getFullYear() // Esto calcula la edad en años
    const monthDif = today.getMonth() - date.getMonth()     // Se usará para saber si cumplio o no años
    const dayDif = today.getDate() - date.getDate()         // Se usará para saber si cumplio o no años
    
    let age = ageDif
    if( monthDif < 0 || ( monthDif == 0 && dayDif < 0 ) ){  // si mothDif menor a 0 aun no cumplio años
        age -= 1                                            // Si mothDif es 0 y dayDif es menor a 0 aun no cumplio años
    }                                                       // Contrarío. Si cumplio años

    if (!birthdate)  message += "Debes completar este campo"
    if (age < 13)   message += 'Debes tener al menos 13 años.'
    if (age > 100)  message += 'La edad no puede ser mayor a 100 años.'
    
    return message
}

export function validateDNI(dni){
    let message = ""
    let cleanDNI = dni.toString().trim()

    if(!cleanDNI) message += "Debes completar este campo"
    if(!/^\d+$/.test(cleanDNI) ) message += "El DNI no puede contener letras"
    if( cleanDNI.length != 8 ) message += "El DNI debe tener 8 caracteres"

    return message
}

export function validateEmail(email){
    let message = ""
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    if(!email) message += "Debes incluir este campo"
    if( !regex.test(email) ) message += "Email invalido"

    return message
}

export function validateAddress(address){
    let message = ""

    if(!address) message += "Debes incluir este campo"
    if(address.length < 4) message += "La dirección debe ser más especifica"

    return message
}

export function validatephone( phone ){
    let message = ""
    if (!phone) message += 'Debes ingresar un número de teléfono.'

    const cleaned = phone.toString().replace(/\D/g, '') // quitar espacios y símbolos

    if (!/^\d+$/.test(cleaned)) {
        message += 'El teléfono solo puede contener números.'
    }

    if (cleaned.length !== 10) {
        message += 'El número debe tener exactamente 10 dígitos (sin 0 ni 15).'
    } // ejemplo 2324 697491 => interior BSAR 10 caracteres sin espacios

    return message
}

export function validatePassword(password){
    let message = ""
    
    if( !password ) message += "Debes completar este campo"
    if( password.length < 3 ) message += "La contraseña debe tener más de 3 caracteres" 
    
    return message
}

//--------------------- INSTITUCIONES--------------------------------------------
export function validateNameInstitution(Name){
    let message = ""
    if(!Name) message += "`Debes completar este campo.`"
    else if(Name.trim().length < 2) message += "El nombre debe tener más de 2 caracteres."
    return message
}
export function validateCUEInstitution(CUE){
    let message = ""
    if(!CUE) message += "Debes completar EL CUE de la institucion."
    return message
}
export function validateAddressInstitution(Address){
    let message = ""
    if(!Address) message += "Debes completar este campo."
    return message
}
export function validateLocalityInstitution(Locality){
    let message = ""
   if(!Locality) message += "`Debes completar este campo.`"
    else if(Locality.trim().length < 3) message += "El nombre debe tener más de 2 caracteres."
    return message
}
export function validateProvinceInstitution(Province){
    let message = ""
   if(!Province) message += "`Debes completar este campo.`"
    else if(Province.trim().length < 3) message += "El nombre debe tener más de 2 caracteres."
    return message
}
export function validatePhoneInstitution(Phone){
    let message = ""
    const cleaned = Phone.toString().replace(/\D/g, '') // quitar espacios y símbolos

   if (!Phone) message += 'Debes ingresar un número de teléfono.'
   else if (!/^\d+$/.test(cleaned)) {
        message += 'El teléfono solo puede contener números.'
    } 
  else if (cleaned.length !== 10) {
        message += 'El número debe tener exactamente 10 dígitos (sin 0 ni 15).'
    } // ejemplo 2324 697491 => interior BSAR 10 caracteres sin espacios
   
    return message
}
export function validateEmailInstitution(Email){
    let message = ""
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    if(!Email) message += "Debes incluir este campo"
    if( !regex.test(Email) ) message += "Email invalido"

    return message
}
export function validateNivelInstitution(Nivel){
    let message = ""
        if(!Nivel) message += "Debes marcar el nivel de educacion."
    return message
}
export function validateTipoInstitution(Tipo){
let message = ""
        if(!Tipo) message += "Debes marcar el Tipo de gestion."
    return message
}