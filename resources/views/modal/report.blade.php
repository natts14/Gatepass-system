<div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="/guard-violation">
            @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">REPORT VIOLATION</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if ($errors->report->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->report->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif 
                    <div class="mb-3">
                        <label>ENTER PLATE NUMBER</label>
                        <input type="text" class="form-control" name="violation_id" placeholder="">
                        <label>VIOLATION SPECIFICATION</label>
                        <input type="text" class="form-control" name="specification" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>