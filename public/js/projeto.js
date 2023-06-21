function deleteRegisterPagination(routeUrl, IDRegister) {
  if (confirm('Deseja excluir?')) {
    $.ajax({
      url: routeUrl,
      method: 'DELETE',
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      data: {
        id: IDRegister
      },
      beforeSend: function () {
        $.blockUI({
          message: 'Carregando...',
          timeout: 2000,
        })
      },
    }).done(function (data) {
      $.unblockUI()
      if (data.success) {
        window.location.reload()
      }
    }).fail(function (data) {
      $.unblockUI()
      alert('Não foi possível buscar os dados')
    })
  }
}