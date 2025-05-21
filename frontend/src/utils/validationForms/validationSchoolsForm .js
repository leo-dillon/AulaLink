import {validateNameInstitution, validateCUEInstitution, validateAddressInstitution,validateLocalityInstitution,validateProvinceInstitution, validatePhoneInstitution,validateEmailInstitution,validateNivelInstitution,validateTipoInstitution  } from "../validations"

export function validateInstitutionForm( data ){
    const errors = {}
    const { 
        Nombre,           
        CUE,
        Direccion,
        Localidad,
        Provincia, 
        Telefonos, 
        Emails,
        Nivel,
        Tipo
    } = data

    const resultValidationNameInstitution = validateNameInstitution(Nombre)
    if( resultValidationNameInstitution ) errors.Nombre = resultValidationNameInstitution 

    const resultvalidateCUEInstitution = validateCUEInstitution(CUE)
    if( resultvalidateCUEInstitution) errors.CUE = resultvalidateCUEInstitution 

    const resultvalidateAddressInstitution = validateAddressInstitution(Direccion)
    if( resultvalidateAddressInstitution) errors.Direccion = resultvalidateAddressInstitution

   const resultvalidateLocalityInstitution = validateLocalityInstitution(Localidad)
    if( resultvalidateLocalityInstitution) errors.Localidad = resultvalidateLocalityInstitution  

   const resultvalidateProvinceInstitution = validateProvinceInstitution(Provincia)
    if( resultvalidateProvinceInstitution) errors.Provincia = resultvalidateProvinceInstitution

   const resultvalidatephoneInstitution = validatePhoneInstitution(Telefonos)
    if( resultvalidatephoneInstitution) errors.Telefonos = resultvalidatephoneInstitution

   const resultvalidateEmailInstitution = validateEmailInstitution(Emails)
    if( resultvalidateEmailInstitution) errors.Emails = resultvalidateEmailInstitution
   
   const resultvalidateNivelInstitution = validateNivelInstitution(Nivel)
    if( resultvalidateNivelInstitution) errors.Nivel = resultvalidateNivelInstitution

const resultvalidateTipoInstitution = validateTipoInstitution(Tipo)
    if( resultvalidateTipoInstitution) errors.Tipo = resultvalidateTipoInstitution

    return errors
}