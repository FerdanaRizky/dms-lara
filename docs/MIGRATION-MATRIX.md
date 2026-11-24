# ACS Panel → Laravel migration matrix

This is a tracking document, not a claim of full parity.

| Area | Evidence in backup | Laravel destination | Status |
|---|---|---|---|
| Docker runtime | compose + inspect | Laravel/PHP deployment | replace after acceptance |
| API/JWT authentication | JWT secret variable only | Laravel auth, policies, API tokens | source audit required |
| SQLite database | data archive; README references database.sqlite | MySQL migrations + importer | schema not inspected |
| GenieACS NBI | ACS context and API image | GenieAcsClient adapter | foundation implemented |
| Device list/details | not in repository source | device pages and NBI queries | partial |
| Refresh/reboot/factory reset | standard NBI tasks | task service + authorization | partial |
| Parameters and values | undocumented | parameter browser/set workflow | pending |
| WAN configuration (add_wan=yes env flag) | environment flag only | WAN profile workflows | pending |
| Users/roles | not documented | users, roles, permissions | pending |
| Firmware/file transfer | undocumented | upload/download and file manager | pending |
| Presets/provisions/virtual parameters | undocumented | provisioning module | pending |
| Logs/events/alarms | undocumented | event and audit timelines | pending |
| Responsive theme | CSS override | Blade layout | base scaffold |
| Backup/restore | shell scripts + DB archive | DB backup/import/export | pending |
| Integrations/settings | minimal runtime env | encrypted settings/adapters | partial |

A feature is complete only when its legacy behavior is evidenced, Laravel implementation exists, authorization is tested and regression tests pass. Do not silently remove any legacy action.
