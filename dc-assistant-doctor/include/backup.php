      <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Appointment ID</th>
              <th>Patient Name</th>
              <th>Service</th>
              <th>Appointment Start</th>
              <th>Doctor</th>
              <th>Status</th>
              <th>View</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>APT0001</td>
              <td>Gerie Mae</td>
              <td>Cleaning</td>
              <td>10:00AM | 12/26/2021</td>
              <td>Urna</td>
              <td><span class="badge badge-secondary">Unconfirmed</span></td>
              <td>

                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ViewAppointUnconfirmed"><i class="fa fa-eye" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#Resched"><i class="fas fa-calendar-day" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Archive"><i class="fas fa-calendar-times" aria-hidden="true"></i></button>

              </td>
            </tr>
            <tr>
              <td>APT0002</td>
              <td>Lennon</td>
              <td>Cleaning</td>
              <td>2:00PM | 12/26/2021</td>
              <td>Urna</td>
              <td><span class="badge badge-primary">Confirmed</span></td>
              <td>

                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ViewAppointConfirmed"><i class="fa fa-eye" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#Resched"><i class="fas fa-calendar-day" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Archive"><i class="fas fa-calendar-times" aria-hidden="true"></i></button>

              </td>
            </tr>
            <tr>
              <td>APT0003</td>
              <td>John</td>
              <td>Brace</td>
              <td>5:00PM | 12/26/2021</td>
              <td>Urna</td>
              <td><span class="badge badge-info">Checked-In</span></td>
              <td>

                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ViewAppointCheckedIn"><i class="fa fa-eye" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#Resched"><i class="fas fa-calendar-day" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Archive"><i class="fas fa-calendar-times" aria-hidden="true"></i></button>

              </td>
            </tr>
            <tr>
              <td>APT0004</td>
              <td>Malubay</td>
              <td>Brace</td>
              <td>5:00PM | 12/26/2021</td>
              <td>Urna</td>
              <td><span class="badge badge-warning">In Chair</span></td>
              <td>

                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ViewAppointInChair"><i class="fa fa-eye" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#Resched"><i class="fas fa-calendar-day" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Archive"><i class="fas fa-calendar-times" aria-hidden="true"></i></button>

              </td>
            </tr>
            <tr>
              <td>APT0005</td>
              <td>Mabelle</td>
              <td>Brace</td>
              <td>7:00PM | 12/26/2021</td>
              <td>Urna</td>
              <td><span class="badge badge-success">Completed</span></td>
              <td>

                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ViewAppointCompleted"><i class="fa fa-eye" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#Resched"><i class="fas fa-calendar-day" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Archive"><i class="fas fa-calendar-times" aria-hidden="true"></i></button>

              </td>
            </tr>
          </tbody>
        </table>
      </div>