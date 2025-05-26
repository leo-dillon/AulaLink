export function validatePagoForm(form) {
  let errors = {}

  if (!form.metodo_pago) errors.metodo_pago = 'Debes seleccionar un método de pago'

  if (form.metodo_pago === 'Transferencia') {
    if (!form.cbu || form.cbu.length < 8) errors.cbu = 'CBU inválido'
  }

  if (form.metodo_pago === 'Tarjeta') {
    if (!form.titular || form.titular.length < 3) errors.titular = 'Titular inválido'
    if (!form.numero_tarjeta || !/^\d{16}$/.test(form.numero_tarjeta)) errors.numero_tarjeta = 'Número de tarjeta inválido'
    if (!form.dni || !/^\d{8}$/.test(form.dni)) errors.dni = 'DNI inválido'
    if (!form.vencimiento) errors.vencimiento = 'Vencimiento requerido'
  }

  if (!form.monto || form.monto <= 0) errors.monto = 'Monto inválido'

  return errors
}
