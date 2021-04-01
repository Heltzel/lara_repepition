<div class="form-group">
          <label for="nameCustomer">Name Customer</label>
          <input class="form-control {{$errors->has('name')? 'border-danger' : '' }}"
                value="{{old('name') ?? $customer->name}}"
                type="text"
                name="name"
                id="nameCustomer">
        </div>
        <div class="form-group">
          <label for="emailCustomer">Email Customer</label>
          <input class="form-control {{$errors->has('email')? 'border-danger' : '' }}"
                value="{{old('email') ?? $customer->email}}"
                type="text"
                name="email"
                id="emailCustomer">
        </div>
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label for="active">Select Customer Status</label>
                    <select name="active" id="active" class="custom-select">
                        @foreach($customer->activeOptions() as $activeOptionKey => $activeOptionValue)
                            <option value="{{$activeOptionKey}}"
                                {{$customer->active == $activeOptionValue ? 'selected': ''}}>
                                    {{$activeOptionValue}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Proile Image</label>
                     <input type="file" name="image" id="image">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="company_id">Select a Company</label>
                    <select name="company_id" id="company_id" class="custom-select">
                        @foreach($companies as $company)
                         <option value="{{$company->id}}" {{$company->id == $customer->company_id? 'selected': ''}}>{{$company->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

