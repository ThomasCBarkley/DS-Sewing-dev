<div>
    <div style="display:{{ $currentStep != 0 ? 'none' : 'block' }}" id="step-0">
    <table align="center">
        <tr>
            <td>
                <table border="0" bgcolor="#ffcc66"
                       style="BORDER-RIGHT:black 1px solid; BORDER-TOP:black 1px solid; BORDER-LEFT:black 1px solid; BORDER-BOTTOM:black 1px solid">
                    <tr>
                        <td>
                            <input type="radio" name="NewOrOld" wire:model="NewOrOld" value="0" Checked="True"/>
                        </td>
                        <td colspan="2">
                            Start a new pool cover.
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" value="1" name="NewOrOld" wire:model="NewOrOld"/>
                        </td>
                        <td colspan="2">
                            Continue a saved pool cover.
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            Enter the pool id of the pool you wish to continue.
                        </td>
                        <td>
                            <input type="text" Runat="server" name="txtPlotID" MaxLength="10" Columns="10" wire:model="txtPlotID"/>
                            @error('txtPlotID') <div class="error alarm alarm-denger">{{ $message }}</div> @enderror
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="middle">
                            <input type="submit" ID="btnStart" value="Start Pool Wizard" wire:click="submitStep0"/>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
<div style="display:{{ $currentStep != 1 ? 'none' : 'block' }}" id="step-1">
    <table align="center" width="600">
        @if ($errors->any())
        <tr>
            <td>
                <b>Please correct the following errors:</b>
                @error('txtPointCount') <div class="error alarm alarm-denger">{{ $message }}</div> @enderror
                @error('txtCrossCount') <div class="error alarm alarm-denger">{{ $message }}</div> @enderror
                @error('txtPerimCount') <div class="error alarm alarm-denger">{{ $message }}</div> @enderror
                @error('txtName') <div class="error alarm alarm-denger">{{ $message }}</div> @enderror
                @error('txtPhone') <div class="error alarm alarm-denger">{{ $message }}</div> @enderror
                @error('txtEmail') <div class="error alarm alarm-denger">{{ $message }}</div> @enderror
            </td>
        </tr>
        @endif
        <tr>
            <td>
                <table style="BORDER-BOTTOM: black 1px solid; BORDER-LEFT: black 1px solid; BORDER-TOP: black 1px solid; BORDER-RIGHT: black 1px solid" bgcolor="#ffcc66" border="0">
                    <tbody><tr>
                        <td align="center" bgcolor="#cccccc" colspan="2"><b>Welcome to the A/B input form! </b>
                        </td>
                    </tr>
                    <tr>
                        <td>Please enter the distance between A and B. (usually 15ft)
                        </td>
                        <td>
                            <input wire:model="txtDistanceFeet" type="text" maxlength="7" size="7" id="txtDistanceFeet">feet<input wire:model="txtDistanceInches" type="text" maxlength="7" size="7" id="txtDistanceInches">inches
                        </td>
                    </tr>
                    <tr>
                        <td>Please input the number of pieces of masking tape X-points.
                            &nbsp;&nbsp;</td>
                        <td><input wire:model="txtPointCount" type="text" maxlength="3" size="3" id="txtPointCount"></td>
                    </tr>
                    <tr>
                        <td>Please enter the number of crosscheck reference points.</td>
                        <td><input wire:model="txtCrossCount" type="text" maxlength="3" size="3" id="txtCrossCount">&nbsp;
                            <font color="red">Maximum of 5 points.</font></td>
                    </tr>
                    <tr>
                        <td>Please enter the number of perimeter reference points.</td>
                        <td><input wire:model="txtPerimCount" type="text" maxlength="3" size="3" id="txtPerimCount">&nbsp;
                            <font color="red">Maximum of 5 points.</font></td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Please enter your name, phone, and email address. We will mail you
                            your plot ID number in case you lose it. <b>This number is very important.</b> Without
                            it you can not correct your measurements should you need to.
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Name
                        </td>
                        <td>
                            <input wire:model="txtName" type="text" maxlength="64" size="30" id="txtName">&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Phone Number
                        </td>
                        <td>
                            <input wire:model="txtPhone" type="text" maxlength="32" size="16" id="txtPhone">&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input wire:model="txtEmail" type="text" maxlength="255" size="48" id="txtEmail">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="right" colspan="2">
                            <input type="submit" ID="btnStart" value="Start Pool Wizard" wire:click="submitStep1"/>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
</div>
</div>