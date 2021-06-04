<div class="modal fade" id="ver">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body m-5">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="mb-3 col-12">
                                <div class="row">
                                    <div class="col-12 justify-content-end d-flex mb-5">
                                        <a href="">
                                            <img class="close-cross" src="{{asset('/img/icons/X.png')}}" alt="salir">
                                        </a>
                                    </div>
                                    <div class="col-12 justify-content-end d-flex mb-3">
                                        <p class="first-text">Prioridad: <span id="priority" class="content-text p-3"></span></p>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center">
                                    <div class="col-12">
                                        <p class="first-text from">De:</p>
                                        <p class="first-text to">Para:</p>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <p class="content-text p-3" id="creator"></p>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <p class="first-text">Fecha: <span class="content-text p-3" id="date"></span></p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 col-12">
                                <div class="row d-flex align-items-center">
                                    <div class="col-12">
                                        <p class="first-text">Asunto:</p>
                                    </div>
                                    <div class="col-12">
                                        <p class="content-text p-3" id="affair"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <p class="first-text">Mensaje:</p>
                            </div>
                            <div class="col-12">
                                <textarea class="textarea-read content-text pl-3 pr-3 pb-3" id="message" rows="8" cols="60" readonly></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


