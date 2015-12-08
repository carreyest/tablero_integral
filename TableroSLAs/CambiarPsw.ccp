<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_c_usuarios" connection="cnDisenio" dataSource="mc_c_usuarios" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="Id" encryptPasswordField="True" encryptPasswordFieldName="Clave" wizardUseInterVariables="False" pkIsAutoincrement="False" wizardCaption="Actualizar Datos" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="mc_c_usuarios">
			<Components>
				<Button id="6" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Enviar" PathID="mc_c_usuariosButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="9" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Clave" fieldSource="Clave" wizardIsPassword="True" wizardUseTemplateBlock="False" wizardCaption="Clave" caption="Clave" required="True" unique="False" wizardSize="50" wizardMaxLength="75" PathID="mc_c_usuariosClave">
					<Components/>
					<Events>
						<Event name="OnValidate" type="Server">
							<Actions>
								<Action actionName="Reset Password Validation" actionCategory="Security" id="10" passwordControlName="Clave"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="14" fieldSourceType="DBColumn" dataType="Text" name="Clave_Shadow" PathID="mc_c_usuariosClave_Shadow">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="15" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="NewPwd" PathID="mc_c_usuariosNewPwd">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ConfirmNewPwd" PathID="mc_c_usuariosConfirmNewPwd">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Panel id="23" visible="False" generateDiv="False" name="Panel1" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" wizardInnerHTML="
          &lt;tr class=&quot;Controls&quot;&gt;
            &lt;td class=&quot;th&quot;&gt;&lt;label for=&quot;mc_c_usuariosUsrSharePoint&quot;&gt;Usr Share Point&lt;/label&gt;&lt;/td&gt; 
            &lt;td&gt;&lt;input type=&quot;text&quot; id=&quot;mc_c_usuariosUsrSharePoint&quot; maxlength=&quot;15&quot; size=&quot;15&quot; value=&quot;{UsrSharePoint}&quot; name=&quot;{UsrSharePoint_Name}&quot;&gt;&lt;/td&gt;
          &lt;/tr&gt;
 
          &lt;tr class=&quot;Controls&quot;&gt;
            &lt;td class=&quot;th&quot;&gt;&lt;label for=&quot;mc_c_usuariosPwdSharePoint&quot;&gt;Pwd Share Point&lt;/label&gt;&lt;/td&gt; 
            &lt;td&gt;&lt;input type=&quot;text&quot; id=&quot;mc_c_usuariosPwdSharePoint&quot; maxlength=&quot;15&quot; size=&quot;15&quot; value=&quot;{PwdSharePoint}&quot; name=&quot;{PwdSharePoint_Name}&quot;&gt;&lt;/td&gt;
          &lt;/tr&gt;
 
          &lt;tr class=&quot;Controls&quot;&gt;
            &lt;td class=&quot;th&quot;&gt;&lt;label for=&quot;mc_c_usuariosCDSDefault&quot;&gt;CDSDefault&lt;/label&gt;&lt;/td&gt; 
            &lt;td&gt;&lt;input type=&quot;text&quot; id=&quot;mc_c_usuariosCDSDefault&quot; maxlength=&quot;15&quot; size=&quot;15&quot; value=&quot;{CDSDefault}&quot; name=&quot;{CDSDefault_Name}&quot;&gt;&lt;/td&gt;
          &lt;/tr&gt;" PathID="mc_c_usuariosPanel1">
<Components>
<TextBox id="11" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UsrSharePoint" fieldSource="UsrSharePoint" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Usr Share Point" caption="Usr Share Point" required="False" unique="False" wizardSize="15" wizardMaxLength="15" PathID="mc_c_usuariosPanel1UsrSharePoint">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
<TextBox id="12" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PwdSharePoint" fieldSource="PwdSharePoint" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Pwd Share Point" caption="Pwd Share Point" required="False" unique="False" wizardSize="15" wizardMaxLength="15" PathID="mc_c_usuariosPanel1PwdSharePoint">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
<TextBox id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CDSDefault" fieldSource="CDSDefault" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="CDSDefault" caption="CDSDefault" required="False" unique="False" wizardSize="15" wizardMaxLength="15" PathID="mc_c_usuariosPanel1CDSDefault">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
</Components>
<Events/>
<Attributes/>
<Features/>
</Panel>
</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Preserve Password" actionCategory="Security" id="5" passwordControlName="Clave" shadowControlName="Clave_Shadow"/>
						<Action actionName="Custom Code" actionCategory="General" id="22"/>
					</Actions>
				</Event>
				<Event name="BeforeBuildUpdate" type="Server">
					<Actions>
						<Action actionName="Encrypt Password" actionCategory="Security" id="7" passwordControlName="Clave" shadowControlName="Clave_Shadow"/>
					</Actions>
				</Event>
				<Event name="OnValidate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="17"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="19" conditionType="Parameter" useIsNull="False" dataType="Integer" field="Id" logicOperator="And" orderNumber="1" parameterSource="CCGetUserId()" parameterType="Expression" searchConditionType="Equal"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="18" posHeight="180" posLeft="10" posTop="10" posWidth="118" tableName="mc_c_usuarios"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="20" fieldName="*"/>
			</Fields>
			<PKFields>
				<PKField id="21" dataType="Integer" fieldName="Id" tableName="mc_c_usuarios"/>
			</PKFields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements/>
			<USPParameters/>
			<USQLParameters/>
			<UConditions/>
			<UFormElements/>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="CambiarPsw_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="CambiarPsw.php" forShow="True" url="CambiarPsw.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
